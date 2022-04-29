<?php

class Contact extends CI_controller {
    /* 	この問い合わせを別のコンテンツに移植するときは、
      １．以下のprivateを書き換えること。
      ２．入力がメール、名前、メッセージのときは問題ないが、
      　　他に足したり引いたりするときは、validationを確認すること。
     */

    private $smtp_host = "mail.evoinf.co.jp";
    private $from_user = "info@evoinf.co.jp";
    private $from_mnt = "info@evoinf.co.jp";

    private $se_alias =array(
        "media"     => "mirakuu@evoinf.co.jp",
        "press"     => "info_contact@evoinf.co.jp",
        "phonics"   => "info_phonics@evoinf.co.jp",
        "mukashi"   => "info_mukashi@evoinf.co.jp",
        "game"      => "info_game@evoinf.co.jp",
        "koudan"    => "info_orine@evoinf.co.jp",
        "anger"     => "info_shimazu@evoinf.co.jp",
        "general"   => "info_contact@evoinf.co.jp"
    );

//    private $to_se = "oyabu.katsumi@nck.co.jp,kume.daisuke@nck.co.jp";

    private $timediffer = "UP9";  //日本時間
    private $home_url = "https://www.evoinf.co.jp/";
    private $user_sbj = "お問い合わせありがとうございます。";
    private $se_sbj =array(
        "media"     => "【EVOサポセン用】MIRAKUU、絵本男子についての問い合わせがあります。",
        "press"     => "【EVOサポセン用】プレスについての問い合わせがあります。",
        "phonics"   => "【EVOサポセン用】Phonicsについての問い合わせがあります。",
        "mukashi"   => "【EVOサポセン用】昔ばなしについての問い合わせがあります。",
        "game"      => "【EVOサポセン用】地方創生ゲームについての問い合わせがあります。",
        "koudan"    => "【EVOサポセン用】講談師神田織音についての問い合わせがあります。",
        "anger"     => "【EVOサポセン用】アンガーマネジメント嶋津良智についての問い合わせがあります。",
        "general"   => "【EVOサポセン用】その他の問い合わせがあります。"
    );
    private $title =array(
        "media"     => "MIRAKUU、絵本男子",
        "press"     => "プレス",
        "phonics"   => "Phonics",
        "mukashi"   => "昔ばなし",
        "game"      => "地方創生ゲーム",
        "koudan"    => "講談師神田織音",
        "anger"     => "アンガーマネジメント嶋津良智",
        "general"   => "その他"
    );
    private $alias_se = "EVOサポートセンター";
    private $ci_folder = "ci";
    private $base_url = "https://www.evoinf.co.jp/";
    
    /**
     * コンストラクタ
     */
    function __construct() {
        parent::__construct();
        // ヘルパー
        $this->load->helper('url');
        $this->load->helper('bangkokmadam');

        // ライブラリ
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->helper("url","form");
    }

    /**
     * メール送信
     * mail = array(
     *      'subject',
     *      'message',
     *      'to_mail_address'
     *      'from_mail_address'
     *      'charset'
     * )
     */
    function _send_mail($mail) {

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $this->smtp_host;
        $config['smtp_port'] = '587';
        $config['charset'] = $mail["charset"];        //'utf-8';
        $config['crlf'] = '/r/n';
        $config['wordwrap'] = FALSE;

        $this->email->initialize($config);

        $this->email->from($mail["from_mail_address"], $mail["from_alias"]);
        $this->email->to($mail["to_mail_address"]);
        $this->email->subject($mail["subject"]);
        $this->email->message($mail["message"]);
        $this->email->send(FALSE);
    }

    /*
     * $type ...        p or biz or (ja)昔の名残。判断はbizしか使ってない。
     * $job  ...        press or general
     * $destination ... ceneter(サポートセンター) or customer(お客さん）
     */

    function index($job = "press") {

        $data["email"] = "";
        $data["nickname"] = "";
        $data["subject"] = "";
        $data["message"] = "";
        $data["type"] = "";
        $data["posturl"] = "/" . $this->ci_folder . "/contact/regist/send/$job";
        $data["job"] = $job;
        $data["baseurl"] = $this->base_url;
        $data["title"]  = $this->title[$job];

        $this->load->view("contact/index_view", $data);
    }

    function regist($mode = "confirm", $job = "press") {

        $data = array();
        $data["baseurl"] = $this->base_url;
        $data["title"]  = $this->title[$job];
        $data["mode"] = $mode;
        if ($this->input->post(NULL, TRUE) == FALSE) {
            $data["email"] = "";
            $data["nickname"] = "";
            $data["subject"] = "";
            $data["message"] = "";
            $data["type"] = "";
            $data["posturl"] = "/" . $this->ci_folder . "/contact/regist/send/$job";
            $data["job"] = $job;
            $data["baseurl"] = $this->base_url;
            $data["error"] = "通信でエラーが起きました。もう一度やり直してください。<br/>";
            $this->load->view("contact/index_view", $data);
            return 0;
        } else {
            $config = array(
                array(
                    "field" => 'name',
                    "label" => 'お名前',
                    "rules" => 'trim|required|max_length[255]'
                ),
                array(
                    "field" => 'kana',
                    "label" => 'フリガナ',
                    "rules" => 'trim|required|max_length[255]'
                ),
                array(
                    'field' => "email",
                    'label' => "ご連絡先メールアドレス",
                    'rules' => "trim|required|valid_email|max_length[255]"
                ),
                array(
                    'field' => "zip",
                    'label' => "郵便番号",
                    'rules' => "trim|max_length[255]"
                ),
                array(
                    'field' => "pref",
                    'label' => "都道府県",
                    'rules' => "trim|required|max_length[255]"
                ),
                array(
                    'field' => "address1",
                    'label' => "住所",
                    'rules' => "trim|required|max_length[255]"
                ),
                array(
                    'field' => "address2",
                    'label' => "建物名等",
                    'rules' => "trim|max_length[255]"
                ),
                array(
                    'field' => "tel",
                    'label' => "電話番号",
                    'rules' => "trim|required|max_length[255]"
                ),
                array(
                    'field' => "fax",
                    'label' => "FAX番号",
                    'rules' => "trim|max_length[255]"
                ),
                array(
                    "field" => 'message',
                    "label" => 'お問い合わせ内容',
                    "rules" => 'trim|required'
                ),
                array(
                    'field' => "howtoknow",
                    'label' => "どのようにして当社をお知りになりましたか",
                    'rules' => "trim|max_length[255]"
                ),
                array(
                    'field' => "others",
                    'label' => "その他の場合",
                    'rules' => "trim|max_length[255]"
                )
            );
            if ($job == "press") {
                array_push($config,array(
                    "field" => 'corporate',
                    "label" => '貴社名',
                    "rules" => 'trim|required|max_length[255]'
                         ),array(
                    "field" => 'url',
                    "label" => 'URL',
                    "rules" => 'trim|valid_url|max_length[255]'
                        ), array(
                    "field" => 'media',
                    "label" => '媒体名',
                    "rules" => 'trim|required|max_length[255]'
                        ), array(
                    "field" => 'media_url',
                    "label" => '媒体URL',
                    "rules" => 'trim|valid_url|max_length[255]'
                        )
                );
            } else {
                array_push($config, array(
                    "field" => 'corporate',
                    "label" => '貴社名',
                    "rules" => 'trim|max_length[255]'
                         ),array(
                    "field" => 'type',
                    "label" => '企業 or 個人',
                    "rules" => 'trim|max_length[255]'
                        )
                );
            }
            $this->form_validation->set_rules($config);

            $rtn = $this->form_validation->run();
            $data["corporate"] = $this->form_validation->set_value_escape_special_chars("corporate");
            $data["name"] = $this->form_validation->set_value_escape_special_chars("name");
            $data["kana"] = $this->form_validation->set_value_escape_special_chars("kana");
            if (!empty($data["kana"])) {
                if (!mb_ereg("^[ァ-ヶー]+$", $data["kana"])) {
                    $rtn = FALSE;
                    $data["error"] = "フリガナは全角カナで入力してください。<br/>";
                }
            }


            $data["email"] = $this->form_validation->set_value_escape_special_chars("email");
            $data["zip"] = $this->form_validation->set_value_escape_special_chars("zip");
            $data["pref"] = $this->form_validation->set_value_escape_special_chars("pref");
            $data["address1"] = $this->form_validation->set_value_escape_special_chars("address1");
            $data["address2"] = $this->form_validation->set_value_escape_special_chars("address2");
            $data["tel"] = $this->form_validation->set_value_escape_special_chars("tel");
            $data["fax"] = $this->form_validation->set_value_escape_special_chars("fax");
            $vowels = array("+", "-");
            if (!empty($data["tel"])) {
                if (!is_numeric(str_replace($vowels, "", $data["tel"]))) {
                    $rtn = FALSE;
                    $data["error"] = "電話番号は半角数値もしくは、「-」「+」のみで入力してください。<br/>";
                }
            }
            if (!empty($data["fax"])) {
                if (!is_numeric(str_replace($vowels, "", $data["fax"]))) {
                    $rtn = FALSE;
                    $data["error"] = "FAX番号は半角数値もしくは、「-」「+」のみで入力してください。<br/>";
                }
            }
            $data["message"] = $this->form_validation->set_value_escape_special_chars("message");
            $data["howtoknow"] = $this->form_validation->set_value_escape_special_chars("howtoknow");
            $data["others"] = $this->form_validation->set_value_escape_special_chars("others");
            if ($job == "press") {
                $data["url"] = $this->form_validation->set_value_escape_special_chars("url");
                $data["media"] = $this->form_validation->set_value_escape_special_chars("media");
                $data["media_url"] = $this->form_validation->set_value_escape_special_chars("media_url");
            } else {
                $data["type"] = $this->form_validation->set_value_escape_special_chars("type");
            }


            $data["job"] = $job;

            if ($rtn == FALSE) {

                $data["posturl"] = "/" . $this->ci_folder . "/contact/regist/send/$job";
                $this->load->view("contact/index_view", $data);
            } else {
                if ($mode == "confirm") {
                    $data["posturl"] = "/" . $this->ci_folder . "/contact/regist/recieve/$job";
                    $data["backurl"] = "/" . $this->ci_folder . "/contact/regist/back/$job";
                    $this->load->view("contact/confirm_" . $job . "_view", $data);
                } elseif ($mode == "back") {
                    $data["posturl"] = "/" . $this->ci_folder . "/contact/regist/send/$job";
                    $this->load->view("contact/index_view", $data);
                } else {
                    $this->received($data);
                }
            }
        }
    }

    function received($data) {

        $data["baseurl"] = $this->base_url;
        $data["timediffer"] = $this->timediffer;
        $data["destination"] = "customer";
        $data["title"] = $this->title[$data["job"]];
        $msg = $this->load->view("contact/email", $data, true);
        //ユーザーに返信
        $subject = $this->user_sbj;
        $alias = $this->alias_se;
        $fromadd = $this->from_user;
        if ($data["job"] == "media"){
	        $fromadd = $this->se_alias["media"];
	    }
        $mail = array(
            'subject' => $subject,
            'message' => $msg,
            'to_mail_address' => $data["email"],
            'from_mail_address' => $fromadd,
            'from_alias' => $alias,
            'charset' => 'utf-8'
        );
        $this->_send_mail($mail);

		$msg="";
        //サポートセンターに送信
        $data["destination"] = "center";
        $msg = $this->load->view("contact/email", $data, true);
        //管理エイリアスに送信
        $mail = array(
            'subject' => $this->se_sbj[$data["job"]],
            'to_mail_address' => $this->se_alias[$data["job"]],
            'from_mail_address' => $this->from_mnt,
            'from_alias' => $this->alias_se,
            'charset' => 'utf-8',
            'message' => $msg
        );
        $this->_send_mail($mail);
        //完了画面の表示
        $data["home_url"] = $this->home_url;
        $this->load->view('contact/received_view', $data);
    }

}
