<?php
class DatabaseHelper
{
    private $db;
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " .$this->db->connect_error);
        } else {
            $this->db->set_charset("utf8");
        }
    }

    public function executeQuery($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllBooks()
    {
        return $this->executeQuery("SELECT * FROM BOOKS");
    }

    public function getAllQuotes()
    {
        return $this->executeQuery("SELECT TEXTNOTES.Content, BOOKS.Title, BOOKS.ID, AUTHORS.Name FROM TEXTNOTES JOIN BOOKS ON TEXTNOTES.BookID = BOOKS.ID JOIN AUTHORS ON TEXTNOTES.AuthorID = AUTHORS.ID WHERE PersonalNote='None'");
    }

    public function getQuotesFromBookID($n)
    {
        return $this->executeQuery("SELECT TEXTNOTES.Content, TEXTNOTES.PersonalNote, TEXTNOTES.Style, BOOKS.Title, BOOKS.ID, AUTHORS.Name FROM TEXTNOTES JOIN BOOKS ON TEXTNOTES.BookID = BOOKS.ID JOIN AUTHORS ON TEXTNOTES.AuthorID = AUTHORS.ID WHERE BookID=".$n);
    }

    public function getRandomQuotes($n)
    {
        return $this->executeQuery("SELECT * FROM TEXTNOTES INNERJOIN ORDER BY RAND() LIMIT ".$n);
    }

    public function getRandomQuotesWithData($n)
    {
        return $this->executeQuery("SELECT TEXTNOTES.Content, BOOKS.Title, BOOKS.ID, AUTHORS.Name FROM TEXTNOTES JOIN BOOKS ON TEXTNOTES.BookID = BOOKS.ID JOIN AUTHORS ON TEXTNOTES.AuthorID = AUTHORS.ID WHERE Style!='0' ORDER BY RAND() LIMIT ".$n);
    }

    public function getAuthorFromID($n)
    {
        return $this->executeQuery("SELECT * FROM AUTHORS WHERE AuthorID=".$n);
    }

    public function getBestQuotes()
    {
        return $this->executeQuery("SELECT TEXTNOTES.Content, BOOKS.Title, BOOKS.ID, AUTHORS.Name, TEXTNOTES.UpVotes FROM TEXTNOTES JOIN BOOKS ON TEXTNOTES.BookID = BOOKS.ID JOIN AUTHORS ON TEXTNOTES.AuthorID = AUTHORS.ID WHERE PersonalNote='None' AND Style='4' ORDER BY UpVotes LIMIT 10");
    }
}
?>