Feature: I would like to edit szczecin

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/szczecin/"
    Then I should not see "<szczecin>"
     And I follow "Create a new entry"
    Then I should see "Szczecin creation"
    When I fill in "Name" with "<szczecin>"
     And I fill in "Size" with "<size>"
     And I fill in "Description" with "<description>"
     And I press "Create"
    Then I should see "<szczecin>"
     And I should see "<size>"
     And I should see "<description>"

  Examples:
    | szczecin        | size | description  |  
    | nadmorska       | 123  | opis ulicy   |
    | fabryczna       | 456  | opis ulicy   |
    | zamkowa         | 789  | opis ulicy   |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/szczecin/"
    Then I should not see "<new-szczecin>"
    When I follow "<old-szczecin>"
    Then I should see "<old-szczecin>"
    When I follow "Edit"
     And I fill in "Name" with "<new-szczecin>"
     And I fill in "Size" with "<new-size>"
     And I fill in "Description" with "<new-description>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-szczecin>"
     And I should see "<new-size>"
     And I should see "<new-description>"
     And I should not see "<old-szczecin>"

  Examples:
    | old-szczecin    | new-szczecin      | new-size   | new-description    |
    | nadmorska       | N-A-D-M-O-R       | 123        | opis ulicy         |
    | fabryczna       | F-A-B-R-Y-C       | 456        | opis ulicy         |


  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/szczecin/"
    Then I should see "<szczecin>"
    When I follow "<szczecin>"
    Then I should see "<szczecin>"
    When I press "Delete"
    Then I should not see "<szczecin>"

  Examples:
    |  szczecin    |
    | zamkowa      |
    | N-A-D-M-O-R  |
    | F-A-B-R-Y-C  |