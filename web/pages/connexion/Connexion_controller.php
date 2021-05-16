<?php
    include_once 'DTO/utilisateursDTO.php';
    include_once 'DAO/utilisateursDAO.php';
    
class Connexion_controller {
        public function includeview() 
            {
                include_once 'Connexion_view.php';
            }

        public function connectUtilisateur($email,$motdepasse) {
            $utilisateur=new utilisateursDTO();
            $utilisateur->setMail($email);
            $utilisateur->setMotdepasse($motdepasse);
            $result=utilisateursDAO::connexUtilisateur($utilisateur);
            return $result;
        }
        public function createUtilisateur($email,$nom,$prenom,$motdepasse,$adresse) {
            $utilisateur=new utilisateursDTO();
            $utilisateur->setMail($email);
            $utilisateur->setMotdepasse($motdepasse);
            $utilisateur->setAdresse($adresse);
            $utilisateur->setPrenom($prenom);
            $utilisateur->setNom($nom);
            $result=utilisateursDAO::createUtilisateur($utilisateur);
            return $result;
        }
        public function testmail($email) {
            $utilisateur=new utilisateursDTO();
            $utilisateur->setMail($email);
            $result=utilisateursDAO::testmail($utilisateur);
            return $result;
        }
        /*public function redirectUser(){
            header ('location: index.php?page=presentation');
        }*/
    }
