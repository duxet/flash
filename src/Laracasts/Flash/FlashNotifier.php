<?php namespace Laracasts\Flash;

class FlashNotifier
{

    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Flash an information message.
     *
     * @param string $message
     */
    public function info($message, $title = 'Info')
    {
        $this->message($message, 'info');

        return $this;
    }

    /**
     * Flash a success message.
     *
     * @param  string $message
     * @return $this
     */
    public function success($message, $title = 'Success')
    {
        $this->message($message, 'success');

        return $this;
    }

    /**
     * Flash an error message.
     *
     * @param  string $message
     * @return $this
     */
    public function error($message, $title = 'Error')
    {
        $this->message($message, 'error');

        return $this;
    }

    /**
     * Flash a warning message.
     *
     * @param  string $message
     * @return $this
     */
    public function warning($message, $title = 'Warning')
    {
        $this->message($message, 'warning');

        return $this;
    }

    /**
     * Flash an overlay modal.
     *
     * @param  string $message
     * @param  string $title
     * @return $this
     */
    public function overlay($message, $title = 'Notice')
    {
        $this->message($message, 'info', $title);

        $this->session->flash('flash_notification.overlay', true);

        return $this;
    }

    /**
     * Flash a general message.
     *
     * @param  string $message
     * @param  string $level
     * @return $this
     */
    public function message($message, $level = 'info', $title = null)
    {
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.level', $level);
        $this->session->flash('flash_notification.title', $title);

        return $this;
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->session->flash('flash_notification.important', true);

        return $this;
    }

}
