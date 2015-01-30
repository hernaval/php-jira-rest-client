<?php

namespace JiraRestApi\Issue;

require 'vendor/autoload.php';

class IssueService extends \JiraRestApi\JiraClient {
    private $uri = "/issue";

 	public function __construct($config, $opt_array = null) {
        parent::__construct($config, $opt_array);        
    }

    /**
     * get all project list
     * 
     * @return Issue class
     */
    public function get($issueIdOrKey) {
    	$ret = $this->exec("$this->uri/$issueIdOrKey", null);

        $this->log->addInfo("Result=\n" . $ret );

        $issue = $this->json_mapper->map(
             json_decode($ret), new Issue()
        );

        return $issue;
    }

    /**
     * create new issue
     * 
     * @param   $issue object of Issue class
     * 
     * @return created issue key
     */
    public function create($issue) {
        $ret = $this->exec($this->uri, null);

        $this->log->addInfo("Result=\n" . $ret );

        $prj = $this->json_mapper->map(
             json_decode($ret), new Project()
        );

        return $prj;
    }
}

?>

