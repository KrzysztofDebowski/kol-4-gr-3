Feature: I would like to edit gdansk

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/gdansk/"
    Then I should not see "<gdansk>"
     And I follow "Create a new entry"
    Then I should see "gdansk creation"
    When I fill in "Name" with "<gdansk>"
     And I fill in "Caption" with "<caption>"
      And I fill in "Size" with "<size>"
 And I press "Create"
    Then I should see "<gdansk>"
    And I should see "<caption>"
    And I should see "<size>"

     
    Then I should see "<gdansk>"
     And I should see "<caption>"
     And I should see "<size>"

  Examples:
    | gdansk       | caption        | size |
    | poniat       | gdanskap | 1234 |
    | grund        | gdanskag | 134 |
    | helu         | gdanskah | 123 |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/gdansk/"
    Then I should not see "<new-gdansk>"
    When I follow "<old-gdansk>"
    Then I should see "<old-gdansk>"
    When I follow "Edit"
     And I fill in "Name" with "<new-gdansk>"
     And I fill in "Caption" with "<new-caption>"
     And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-gdansk>"
     And I should see "<new-caption>"
        And I should see "<new-size>"
     And I should not see "<old-gdansk>"

  Examples:
    | old-gdansk     | new-gdansk  | new-caption   | new-size |
    | poniat         | P-O-N-I-A-T | nowy p      | 12 |
    | grund          | G-R-U-N-D       | nowy g    | 12332 |


  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/gdansk/"
    Then I should see "<gdansk>"
    When I follow "<gdansk>"
    Then I should see "<gdansk>"
    When I press "Delete"
    Then I should not see "<gdansk>"

  Examples:
    |  gdansk    |
    | helu   |
    | P-O-N-I-A-T  |
    | G-R-U-N-D   |