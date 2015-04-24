Feature: I would like to edit Elblag
  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/elblag/"
    Then I should not see "<elblag>"
     And I follow "Create a new entry"
    Then I should see "France creation"
    When I fill in "Name" with "<elblag>"
     And I fill in "Caption" with "<caption>"
    And I fill in "Size" with "<size>" 
    And I press "Create"
    Then I should see "<elblag>"
     And I should see "<caption>"
     And I should see "<size>"
  Examples:
    | elblag      | caption                 | size  |
    | cicha       | to jest opis cichej     | 300   |
    | lesna       | to jest opis lesnej     | 400   |
    | deszczowa   | to jest opis deszczowej | 567   |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/elblag/"
    Then I should not see "<new-elblag>"
    When I follow "<old-elblag>"
    Then I should see "<old-elblag>"
    When I follow "Edit"
     And I fill in "Name" with "<new-elblag>"
     And I fill in "Caption" with "<new-caption>"
     And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-elblag>"
     And I should see "<new-caption>"
     And I should see "<new-size>"
     And I should not see "<old-elblag>"

  Examples:
    | old-elblag      | new-elblag   | new-caption          | new-size |
    | cicha           | mokra        | to jest opis mokrej  | 298      |
    | lesna           | sucha        | to jest opis suchej  | 449      | 


  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/elblag/"
    Then I should see "<elblag>"
    When I follow "<elblag>"
    Then I should see "<elblag>"
    When I press "Delete"
    Then I should not see "<elblag>"

  Examples:
    | elblag      |
    | deszczowa   |
    | mokra       |
    | sucha       |