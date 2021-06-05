Projekt: Exotic Animals

Gruppenmitglieder:
    *) Aleksandar Sasa Calic
    *) Batuhan Sazak
    *) Nenad Neskovic
    *) Sergio Tallo Torres

Eingesetzte Technologien:
 - Einsatz von HTML, CSS
 - Darstellung der dynamischen Inhalte mittels .vue Komponente
 - Einsatz des Bulma Frameworks für das Styling des CSS der .vue Komponente und .blade.php Komponente.


Beschreibung und Funktionalität der Komponente:

 Beim Start der Applikation landet der Benutzer unter localhost(Port=8000) am Welcome Page. Dort besteht die Möglichkeit sich einloggen zu können sobald man einen Account hat oder sich ins System zu registrieren falls man noch keinen Account hat. Der Login erfolgt mittels Email und Password. Die Registration erfolgt mittels Name, Email und Passwort (samt Wiederholungscheck). Nach einem Login, Registration landet der Nutzer im homepage und kann sich nun in der Applikation navigieren.

 In der NavBar stehen verschiedene Funktionen zur Verfügung. Unter dem Reiter Animals kann der Nutzer bei List sich alle Tiere die im Datenbank gespeichert wurden auflisten, bearbeiten oder den Eintrag aus der Datenbank löschen. Beim Bearbeiten können nur die Beschreibung und der Spezies geändert werden.
 Unter Create hat der Nutzer die Möglichkeit ein neues Tier in der Datenbank speichern zu können. Dazu müssen der Name, eine kurze Beschreibung zum Tier und im Dropdown Menü die dazugehörige Spezies ausgewählt sein.
 Bei Search kann der Nutzer ein bestimmtes Tier nach seinem Namen suchen und auflisten. Auch hier besteht wieder die Möglichkeit den Eintrag editieren oder löschen zu können.

 Im Reiter Species stehen dem Nutzer zwei Funktionen zur Verfügung: List und Create. Beim List kann der Nutzer wieder die Tiere im System auflisten, dort direkt bearbeiten oder löschen. Wobei beim Bearbeiten hier nur die Beschreibung geändert werden kann. Beim Create kann der Nutzer einen neuen Spezies anlegen samt Beschreibung wo gewisse Tiere zugeordnet werden können.

 Weiters kann der Nutzer über seinen Nutzerprofil wo der Name steht die Applikation mittels Logout verlassen.

