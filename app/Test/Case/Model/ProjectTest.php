<?php
App::uses('Project', 'Model');

/**
 * Project Test Case
 *
 */
class ProjectTestCase extends CakeTestCase {

    /**
     * @var Project
     */
    public $Project;

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.project', 'app.wiki', 'app.wiki_page', 'app.wiki_content', 'app.user', 'app.token', 'app.user_preference', 'app.member', 'app.role', 'app.wiki_content_version', 'app.wiki_redirect', 'app.issue_category', 'app.version', 'app.issue', 'app.issue_status', 'app.enumeration', 'app.tracker', 'app.workflow', 'app.time_entry', 'app.changeset', 'app.changesets_issue', 'app.enabled_module', 'app.projects_tracker', 'app.custom_field', 'app.custom_value', 'app.custom_fields_project');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Project = ClassRegistry::init('Project');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown()
    {
		unset($this->Project);

		parent::tearDown();
	}

/**
 * testFindById method
 *
 * @return void
 */
	public function testFindById()
    {
        $data = $this->Project->findById(1);
        $this->assertEqual($data['Project']['name'],'eCookbook');
        $this->assertFalse($this->Project->findById(100));
	}
/**
 * testFindByIdentifier method
 *
 * @return void
 */
	public function testFindByIdentifier()
    {
        $data = $this->Project->findByIdentifier('onlinestore');
        $this->assertEqual($data['Project']['name'],'OnlineStore');
        $this->assertFalse($this->Project->findByIdentifier('onlinestore2'));
	}
/**
 * testFindSubprojects method
 *
 * @return void
 */
	public function testFindSubprojects()
    {
        $data = $this->Project->findSubprojects(1);
        $this->assertCount(3,$data);

        $data = $this->Project->findSubprojects(5);
        $this->assertCount(0,$data);

    }
/**
 * testFindMainProject method
 *
 * @return void
 */
	public function testFindMainProject()
    {
        $this->loadFixtures('Issue', 'Project', 'Tracker', 'IssueStatus', 'User', 'Version', 'Enumeration', 'IssueCategory', 'TimeEntry', 'Changeset', 'EnabledModule','CustomFieldsProject', 'Wiki', 'ProjectsTracker', 'Member', 'CustomField', 'CustomValue');
        $project = $this->Project->findMainProject('ecookbook');
        $this->assertEqual('eCookbook', $project['Project']['name']);
        $this->assertEqual(8, count($project['EnabledModule']));
        $this->assertEqual(
            array('issue_tracking','time_tracking','news','documents','files','wiki','repository','boards'),
            array_reverse(Set::extract('{n}.name', $project['EnabledModule']))
        );
 	}
/**
 * testLatest method
 *
 * @return void
 */
	public function testLatest() {

	}
/**
 * testVisibleBy method
 *
 * @return void
 */
	public function testVisibleBy() {

	}
/**
 * testGetVisibleByCondition method
 *
 * @return void
 */
	public function testGetVisibleByCondition() {

	}
/**
 * testAllowedToCondition method
 *
 * @return void
 */
	public function testAllowedToCondition() {

	}
/**
 * testAllowedToConditionString method
 *
 * @return void
 */
	public function testAllowedToConditionString() {

	}
/**
 * testProjectCondition method
 *
 * @return void
 */
	public function testProjectCondition() {

	}
/**
 * testIsActive method
 *
 * @return void
 */
	public function testIsActive() {

	}
/**
 * testArchive method
 *
 * @return void
 */
	public function testArchive() {

	}
/**
 * testUnarchive method
 *
 * @return void
 */
	public function testUnarchive() {

	}
/**
 * testActiveChildren method
 *
 * @return void
 */
	public function testActiveChildren() {

	}
/**
 * testAssignableUsers method
 *
 * @return void
 */
	public function testAssignableUsers() {

	}
/**
 * testMembers method
 *
 * @return void
 */
	public function testMembers() {

	}
/**
 * testRecipients method
 *
 * @return void
 */
	public function testRecipients() {

	}
/**
 * testShortDescription method
 *
 * @return void
 */
	public function testShortDescription() {

	}
/**
 * testAfterFindOne method
 *
 * @return void
 */
	public function testAfterFindOne() {

	}
/**
 * testIsAllowsTo method
 *
 * @return void
 */
	public function testIsAllowsTo() {

	}
}
