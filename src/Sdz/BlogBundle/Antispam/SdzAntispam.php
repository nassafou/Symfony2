<?php

namespace Sdz\BlogBundle\Antispam;
class SdzAntispam
{
    #Les attributs
    protected $mailer;
    protected $locale;
    protected $nbForSpam;
    
    public function __construct(\Swift_Mailer $mailer, $locale, $nbForSpam)
    {
        $this->mailer    = $mailer;
        $this->locale    = $locale;
        $this->nbForSpam =$nbForSpam;
    }
    
   /**
    *Verifie si le text est un spam ou non
    *Un test est considéré comme spam à partir de 3 liens
    *ou adresses e-mail dans contenu
    *
    *@param string $text 
    */    
    
    public function isSpam($text)
    {
        // on utilise maintenant l'argument $this->nbForSpam et non 3
        
        return ($this->countLinks($text) + $this->countMails($text)) >= $this->nbForSpam;
    }
    /**
     *Compte les URL de $text
     *
     *@param string $text
     */
    private function countLinks($text)
    {
        preg_match_all(
            '#(http|https|ftp)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?#i',
            $text,
            $matches);
        return count($matches[0]);
    }
    /**
     *Compte les e-mails de $text
     *
     *@param string $text
     */
    private function countMails($text)
    {
        preg_match_all(
            '#[a-z0-9._-]+@[a-z0-9.0_-]{2,}\.[a-z]{2,4}#i',
            $text,
            $matches);
        return count($matches[0]);
    }
    
    
    
}

