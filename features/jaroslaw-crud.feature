Feature: I would like to edit jaroslaw

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/jaroslaw/"
    Then I should not see "<jaroslaw>"
     And I follow "Create a new entry"
    Then I should see "Jaroslaw creation"
    When I fill in "Name" with "<jaroslaw>"
     And I fill in "Caption" with "<caption>"
     And I fill in "Size" with "<size>"
     And I press "Create"
    Then I should see "<jaroslaw>"
     And I should see "<caption>"
     And I should see "<size>"

  Examples:
    | jaroslaw       | caption                  | size   | 
    | Kazimierzowska | ulica krola kazimierza   | 50     |
    | Jagiellonska   | ulica rodu jagiellonow   | 60     |
    | Wysockiego     | ulica lipowica           | 70     |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/jaroslaw/"
    Then I should not see "<new-jaroslaw>"
    When I follow "<old-jaroslaw>"
    Then I should see "<old-jaroslaw>"
    When I follow "Edit"
     And I fill in "Name" with "<new-jaroslaw>"
     And I fill in "Caption" with "<new-caption>"
     And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-jaroslaw>"
     And I should see "<new-size>"  
     And I should see "<new-size>"
     And I should not see "<old-jaroslaw>"

  Examples:
    | old-jaroslaw     | new-jaroslaw   | new-caption        | new-size  |
    | Jagiellonska     | Tarnawskiego   | moja ulica         |  80       |      

  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/jaroslaw/"
    Then I should see "<jaroslaw>"
    When I follow "<jaroslaw>"
    Then I should see "<jaroslaw>"
    When I press "Delete"
    Then I should not see "<jaroslaw>"

  Examples:
    |  jaroslaw      |
    | Kazimierzowska |
    | Tarnawskiego   |
    | Wysockiego     |