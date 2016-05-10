<?php

namespace DataBundle\Entity;
use JMS\Serializer\Annotation\AccessType;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\MaxDepth;
use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
/**
 * Emails
 */
class Emails
{
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $id;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $subject;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $content;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic"}) 
     */
    private $emailsattachments;

    /**
     * @var \DataBundle\Entity\EmailsAddresses
     */
    private $emailsaddresses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emailsattachments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Emails
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Emails
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Add emailsattachment
     *
     * @param \DataBundle\Entity\EmailsAttachments $emailsattachment
     *
     * @return Emails
     */
    public function addEmailsattachment(\DataBundle\Entity\EmailsAttachments $emailsattachment)
    {
        $this->emailsattachments[] = $emailsattachment;

        return $this;
    }

    /**
     * Remove emailsattachment
     *
     * @param \DataBundle\Entity\EmailsAttachments $emailsattachment
     */
    public function removeEmailsattachment(\DataBundle\Entity\EmailsAttachments $emailsattachment)
    {
        $this->emailsattachments->removeElement($emailsattachment);
    }

    /**
     * Get emailsattachments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmailsattachments()
    {
        return $this->emailsattachments;
    }

    /**
     * Set emailsaddresses
     *
     * @param \DataBundle\Entity\EmailsAddresses $emailsaddresses
     *
     * @return Emails
     */
    public function setEmailsaddresses(\DataBundle\Entity\EmailsAddresses $emailsaddresses = null)
    {
        $this->emailsaddresses = $emailsaddresses;

        return $this;
    }

    /**
     * Get emailsaddresses
     *
     * @return \DataBundle\Entity\EmailsAddresses
     */
    public function getEmailsaddresses()
    {
        return $this->emailsaddresses;
    }
    /**
     * @var string
     */
    private $file_path;


    /**
     * Set filePath
     *
     * @param string $filePath
     *
     * @return Emails
     */
    public function setFilePath($filePath)
    {
        $this->file_path = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->file_path;
    }
    /**
     * @var string
     */
    private $message_id;


    /**
     * Set messageId
     *
     * @param string $messageId
     *
     * @return Emails
     */
    public function setMessageId($messageId)
    {
        $this->message_id = $messageId;

        return $this;
    }

    /**
     * Get messageId
     *
     * @return string
     */
    public function getMessageId()
    {
        return $this->message_id;
    }
    /**
     * @var string
     */
    private $cc;

    /**
     * @var string
     */
    private $bcc;


    /**
     * Set cc
     *
     * @param string $cc
     *
     * @return Emails
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Get cc
     *
     * @return string
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Set bcc
     *
     * @param string $bcc
     *
     * @return Emails
     */
    public function setBcc($bcc)
    {
        $this->bcc = $bcc;

        return $this;
    }

    /**
     * Get bcc
     *
     * @return string
     */
    public function getBcc()
    {
        return $this->bcc;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $reply;

    /**
     * @var \DataBundle\Entity\Emails
     */
    private $reply_to;


    /**
     * Add reply
     *
     * @param \DataBundle\Entity\Reply $reply
     *
     * @return Emails
     */
    public function addReply(\DataBundle\Entity\Reply $reply)
    {
        $this->reply[] = $reply;

        return $this;
    }

    /**
     * Remove reply
     *
     * @param \DataBundle\Entity\Reply $reply
     */
    public function removeReply(\DataBundle\Entity\Reply $reply)
    {
        $this->reply->removeElement($reply);
    }

    /**
     * Get reply
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Set replyTo
     *
     * @param \DataBundle\Entity\Emails $replyTo
     *
     * @return Emails
     */
    public function setReplyTo(\DataBundle\Entity\Emails $replyTo = null)
    {
        $this->reply_to = $replyTo;

        return $this;
    }

    /**
     * Get replyTo
     *
     * @return \DataBundle\Entity\Emails
     */
    public function getReplyTo()
    {
        return $this->reply_to;
    }
    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;


    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Emails
     */
    public function setUsers(\DataBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \DataBundle\Entity\Users
     */
    public function getUsers()
    {
        return $this->users;
    }
    /**
     * @var \DataBundle\Entity\Users
     */
    private $to;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $from;


    /**
     * Set to
     *
     * @param \DataBundle\Entity\Users $to
     *
     * @return Emails
     */
    public function setTo(\DataBundle\Entity\Users $to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \DataBundle\Entity\Users
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set from
     *
     * @param \DataBundle\Entity\Users $from
     *
     * @return Emails
     */
    public function setFrom(\DataBundle\Entity\Users $from = null)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return \DataBundle\Entity\Users
     */
    public function getFrom()
    {
        return $this->from;
    }
    /**
     * @var \DataBundle\Entity\EmailsAddresses
     * @Groups({"basic"}) 
     */
    private $to_emailsaddresses;

    /**
     * @var \DataBundle\Entity\EmailsAddresses
     * @Groups({"basic"}) 
     */
    private $from_emailsaddresses;

    /**
     * @var \DataBundle\Entity\Users
     * @Groups({"basic"}) 
     */
    private $to_users;

    /**
     * @var \DataBundle\Entity\Users
     * @Groups({"basic"}) 
     */
    private $from_users;


    /**
     * Set toEmailsaddresses
     *
     * @param \DataBundle\Entity\EmailsAddresses $toEmailsaddresses
     *
     * @return Emails
     */
    public function setToEmailsaddresses(\DataBundle\Entity\EmailsAddresses $toEmailsaddresses = null)
    {
        $this->to_emailsaddresses = $toEmailsaddresses;

        return $this;
    }

    /**
     * Get toEmailsaddresses
     *
     * @return \DataBundle\Entity\EmailsAddresses
     */
    public function getToEmailsaddresses()
    {
        return $this->to_emailsaddresses;
    }

    /**
     * Set fromEmailsaddresses
     *
     * @param \DataBundle\Entity\EmailsAddresses $fromEmailsaddresses
     *
     * @return Emails
     */
    public function setFromEmailsaddresses(\DataBundle\Entity\EmailsAddresses $fromEmailsaddresses = null)
    {
        $this->from_emailsaddresses = $fromEmailsaddresses;

        return $this;
    }

    /**
     * Get fromEmailsaddresses
     *
     * @return \DataBundle\Entity\EmailsAddresses
     */
    public function getFromEmailsaddresses()
    {
        return $this->from_emailsaddresses;
    }

    /**
     * Set toUsers
     *
     * @param \DataBundle\Entity\Users $toUsers
     *
     * @return Emails
     */
    public function setToUsers(\DataBundle\Entity\Users $toUsers = null)
    {
        $this->to_users = $toUsers;

        return $this;
    }

    /**
     * Get toUsers
     *
     * @return \DataBundle\Entity\Users
     */
    public function getToUsers()
    {
        return $this->to_users;
    }

    /**
     * Set fromUsers
     *
     * @param \DataBundle\Entity\Users $fromUsers
     *
     * @return Emails
     */
    public function setFromUsers(\DataBundle\Entity\Users $fromUsers = null)
    {
        $this->from_users = $fromUsers;

        return $this;
    }

    /**
     * Get fromUsers
     *
     * @return \DataBundle\Entity\Users
     */
    public function getFromUsers()
    {
        return $this->from_users;
    }
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $sent_time;

    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $delivery_time;

    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $read_time;

    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $is_read;


    /**
     * Set sentTime
     *
     * @param integer $sentTime
     *
     * @return Emails
     */
    public function setSentTime($sentTime)
    {
        $this->sent_time = $sentTime;

        return $this;
    }

    /**
     * Get sentTime
     *
     * @return integer
     */
    public function getSentTime()
    {
        return $this->sent_time;
    }

    /**
     * Set deliveryTime
     *
     * @param integer $deliveryTime
     *
     * @return Emails
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->delivery_time = $deliveryTime;

        return $this;
    }

    /**
     * Get deliveryTime
     *
     * @return integer
     */
    public function getDeliveryTime()
    {
        return $this->delivery_time;
    }

    /**
     * Set readTime
     *
     * @param integer $readTime
     *
     * @return Emails
     */
    public function setReadTime($readTime)
    {
        $this->read_time = $readTime;

        return $this;
    }

    /**
     * Get readTime
     *
     * @return integer
     */
    public function getReadTime()
    {
        return $this->read_time;
    }

    /**
     * Set isRead
     *
     * @param integer $isRead
     *
     * @return Emails
     */
    public function setIsRead($isRead)
    {
        $this->is_read = $isRead;

        return $this;
    }

    /**
     * Get isRead
     *
     * @return integer
     */
    public function getIsRead()
    {
        return $this->is_read;
    }
    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $from_name;


    /**
     * Set fromName
     *
     * @param string $fromName
     *
     * @return Emails
     */
    public function setFromName($fromName)
    {
        $this->from_name = $fromName;

        return $this;
    }

    /**
     * Get fromName
     *
     * @return string
     */
    public function getFromName()
    {
        return $this->from_name;
    }
}
