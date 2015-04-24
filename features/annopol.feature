Feature: I would like to edit annopol

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/annopol/"
    Then I should not see "<annopol>"
     And I follow "Create a new entry"
    Then I should see "Annopol creation"
    When I fill in "Name" with "<annopol>"
     And I fill in "Caption" with "<caption>"
     And I fill in "Size" with "<size>"
     And I press "Create"
    Then I should see "<annopol>"
     And I should see "<caption>"
     And I should see "<size>"

  Examples:
    | annopol     | caption  | size |
    | biala       | opis     |  123 |
    | czarna      | opis     |  321 |
    | niebieska   | opis     |  123 |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/annopol/"
    Then I should not see "<new-annopol>"
    When I follow "<old-annopol>"
    Then I should see "<old-annopol>"
    When I follow "Edit"
     And I fill in "Name" with "<new-annopol>"
     And I fill in "Caption" with "<new-caption>"
     And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-annopol>"
     And I should see "<new-caption>"
     And I should see "<new-size>"
     And I should not see "<old-annopol>"

  Examples:
    | old-annopol     | new-annopol       | new-caption    | new-size |
    | biala           | B-I-A-L-A         | opis           |  123     |
    | czarna          | C-Z-A-R-N-A       | opis           |  321     |


  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/annopol/"
    Then I should see "<annopol>"
    When I follow "<annopol>"
    Then I should see "<annopol>"
    When I press "Delete"
    Then I should not see "<annopol>"

  Examples:
    |  annopol    |
    | B-I-A-L-A   |
    | C-Z-A-R-N-A   |
    | niebieska   |