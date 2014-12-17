<!--http://stenden-ehelp.nl/classes/create.class%20-%20Martijn.php-->

<?php
require_once 'user.class.php';

class create extends user
{

    public function __construct()
    {
        parent::__construct();
    }

    public function medewerker()
    {
        if ($this->register(array("Gebruikersnaam", "Wachtwoord", "Autorisatie"), "Medewerker"))
        {
            $data = array();
            $fields = array(
                "idMedewerker",
                "Email",
                "voornaam",
                "Achternaam",
                "Tussenvoegsel");
            foreach ($fields as $field)
            {
                $data[$field] = filter_input(INPUT_POST, $field);
                if ($data[$field] === '')
                {
                    trigger_error("Lege input");
                }
            }
        }
        // Insert the data into the database
        $check = $this->insert($data);
        if ($check === 1)
        {
            return TRUE;
        } else
        {
            trigger_error("Error bij het aanmaken van uw account!");
        }
    }

    
    public function bedrijfsMedewerker()
    {
        if ($this->register(array("Gebruikersnaam", "Wachtwoord", "Autorisatie"), "Medewerker"))
        {
            $data = array();
            $fields = array(
                "idBedrijfsMedewerker",
                "idBedrijf",
                "Email",
                "voornaam",
                "Achternaam",
                "Tussenvoegsel",
                "Functie");
            foreach ($fields as $field)
            {
                $data[$field] = filter_input(INPUT_POST, $field);
                if ($data[$field] === '')
                {
                    trigger_error("Lege input");
                }
            }
        }
        // Insert the data into the database
        $check = $this->insert($data);
        if ($check === 1)
        {
            return TRUE;
        } else
        {
            trigger_error("Error bij het aanmaken van uw account!");
        }
    }

}

//if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
//    $fields = array("Gebruikersnaam", "Wachtwoord", "Autorisatie");
//    var_dump($user->register($fields));
//}
////
//<html>
//    <head>
//        <title>Test</title>
//    </head>
//    <body>
//        <form action="" method="POST">
//            Gebruikersnaam: <input type="text" name="Gebruikersnaam" />
//            <br/>
//            Wachtwoord: <input type="text" name="Wachtwoord" />
//            <br/>
//            Autorisatie:<br/>
//            <select name="Autorisatie">
//                <option value="Teamleider">Teamleider</option>
//                <option value="Admin">Admin</option>
//                <option value="Medewerker">Medewerker</option>
//                <option value="Bedrijfsmedewerker">Bedrijfsmedewerker</option>
//            </select>
//            <br/>
//            <input type="submit" value="submit" name="submit" />
//        </form>
//    </body>
//</html>