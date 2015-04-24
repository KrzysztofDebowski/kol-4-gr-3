Feature: I would like to edit radom

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/radom/"
    Then I should not see "<radom>"
     And I follow "Create a new entry"
    Then I should see "radom creation"
    When I fill in "Name" with "<radom>"
     And I fill in "Name" with "<name>"
    And I fill in "Caption" with "<caption>"
    And I fill in "Size" with "<size>"
     And I press "Create"
    Then I should see "<radom>"
     And I should see "<name>"
   And I should see "<caption>"
   And I should see "<size>"

  Examples:
    | radom     | name | caption | size |
    | warszawska       | warszawska  | tekst| 20000|
    | kowala      | kowala | tekst |1500|
    | deblinska   | deblinska  | tekst| 700|



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/radom/"
    Then I should not see "<new-radom>"
    When I follow "<old-radom>"
    Then I should see "<old-radom>"
    When I follow "Edit"
     And I fill in "Name" with "<new-radom>"
     And I fill in "Caption" with "<new-caption>"
 And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-radom>"
 And I should see "<new-name>"
     And I should see "<new-caption>"
 And I should see "<new-size>"
     And I should not see "<old-radom>"

  Examples:
    | old-radopm     | new-radom  | new-caption    | new-size |
    | warszawska           | W-A-R-S-Z-A-W-S-K-A       | text       | 2345|
    | kowala          | K-O-W-A-L-A       | tekst       | 3122| 


  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/radom/"
    Then I should see "<radom>"
    When I follow "<radom>"
    Then I should see "<radom>"
    When I press "Delete"
    Then I should not see "<radom>"

  Examples:
    |  radom    |
    | deblinska   |
    |  W-A-R-S-Z-A-W-S-K-A |
    | K-O-W-A-L-A   |