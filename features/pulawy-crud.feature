Feature: I would like to edit pulawy

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/pulawy/"
    Then I should not see "<pulawy>"
     And I follow "Create a new entry"
    Then I should see "Pulawy creation"
    When I fill in "Name" with "<pulawy>"
     And I fill in "Caption" with "<caption>"
     And I fill in "Size" with "<size>"
     And I press "Create"
    Then I should see "<pulawy>"
     And I should see "<caption>"
     And I should see "<size>"

  Examples:
    | pulawy   | caption         | size   | 
    | Lubelska | opis Lubelska   | 234234 |
    | Hinska   | opis Hinska     | 3234   |
    | Boak     | opis Boak       | 3234   |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/pulawy/"
    Then I should not see "<new-pulawy>"
    When I follow "<old-pulawy>"
    Then I should see "<old-pulawy>"
    When I follow "Edit"
     And I fill in "Name" with "<new-pulawy>"
     And I fill in "Caption" with "<new-caption>"
     And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-pulawy>"
     And I should see "<new-size>"  
     And I should see "<new-size>"
     And I should not see "<old-pulawy>"

  Examples:
    | old-pulawy     | new-pulawy   | new-caption        | new-size  |
    | Hinska         | Warszawska   | opis Warszawska    |  253235   |      

  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/pulawy/"
    Then I should see "<pulawy>"
    When I follow "<pulawy>"
    Then I should see "<pulawy>"
    When I press "Delete"
    Then I should not see "<pulawy>"

  Examples:
    |  pulawy     |
    | Lubelska    |
    | Warszawska  |
    | Boak        |