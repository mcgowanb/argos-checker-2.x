<?php
App::uses('AppShell', 'Console/Command');

/**
 * Import Shell
 *
 * http://cakephpsaint.wordpress.com/2013/05/15/6-steps-to-create-cron-jobs-in-cakephp/
 * uses tasks instead of components
 *
 * to execute from APP
 * "Console\cake ImportCron"
 *
 *
 * @package       app.Console.Command
 */
class UpdateStoresShell extends AppShell {
    public $uses = array('Store');

    function main() {
        $this->out('Welcome to the Shell updater, This Shell will now update the database records');
        $this->out();

        $this->out('<warning>Fetching URL data, please wait</warning>');
        $this->out();
        $this->out('---------------------------------------------------------------');
        $this->out();

        $old = $this->Store->getExisting();
        $new = $this->Store->downloadStoreList();
        $this->out('<info>Store data received.......... processing</info>');

        $changes = $this->Store->checkForNewStores($new, $old);

        if (isEmpty($changes)) {
            $this->out('<info>No Stores to Update</info>');
        }
        else{
            $this->out('<info>Store Lists have changed, updating database......</info>');
            $result = $this->Store->updateDataBase($new);
            $this->out($result);
        }


        $this->out();
        $this->out('---------------------------------------------------------------');
        $this->out();
    }

    public function hey_there() {
        $this->out('Hey there ' . $this->args[0]);
    }
}
