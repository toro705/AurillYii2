<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    // public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email']
            // verifyCode needs to be entered correctly
          //  ['verifyCode', 'captcha', 'captchaAction' => 'site/captcha']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            //'verifyCode' => 'Código de Verificación',
            'name' => 'Nombre',
            'email' => 'Email',
            'subject' => 'Tema',
            'body' => 'Detalle',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            $nombre = $this->name;
            $visitor_email = $this->email;
            $tema = $this->subject;
            $message = $this->body;
            $cuerpo = "
            <html> 
                <head> 
                   <title>Nuevo Contacto</title> 
                </head> 
                <body> 
                <h2>Nuevo contacto</h2> 
                <p><b>Nombre: </b>'$nombre'</p> 
                <p><b>Email: </b>'$visitor_email'</p> 
                <p><b>Tema: </b>'$tema'</p> 
                <p><b>Mensaje: </b>'$message'</p> 
                </body> 
            </html> ";
            // $to      = 'toro70568@gmail.com';
            $to      = $email;
            $subject = 'Una nueva consulta';
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            $headers .= "From: Contacto <no-reply@c0700189.ferozo.com>\r\n"; 
                phpversion();
            mail($to, $subject, $cuerpo, $headers); 
            return true;
            Yii::$app->session->setFlash('contactFormSubmitted');

            // Yii::$app->mailer->compose()
            //     ->setFrom([$this->email => $this->name])
            //     ->setTo($email)
            //     ->setSubject($this->subject)
            //     ->setTextBody($this->body)
            //     ->send();

        }
        return false;
    }
}
