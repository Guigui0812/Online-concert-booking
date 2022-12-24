<body id="theBody">

    <div id="adminAuth">
                
        <form id="loginForm" method="POST">

            <h1>Connexion</h1>             
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            <input type="submit" id='submit' value='LOGIN'>
        </form>
    </div>

    <div id="adminContent">
        <table id="myTable">
            <thead>
                <tr>
                    <th>Commande ID</th>
                    <th>Prénom/Nom</th>
                    <th>Email</th>
                    <th>Statut</th>        
                    <th>Date de commande</th>
                </tr>
            </thead>

                <tbody>
                    <?php
    
                        $query = "SELECT commande.id 
                        AS commandeId, prenom, nom, email, statut_id, date_commande 
                        FROM commande, contact 
                        WHERE commande.contact_id = contact.id";                      
                        $stmt = $pdo->query($query);
    
                        foreach ( $stmt->fetchAll() as $commande ){

                            echo "<tr>";
                            echo "<td>".$commande['commandeId']."</td>";
                            echo "<td>".$commande['prenom']." ".$commande['nom']."</td>";
                            echo "<td>".$commande['email']."</td>";
    
                            if($commande['statut_id'] == 1){
                                echo "<td> Validée </td>";
                            } else {
                                echo "<td>A confirmer</td>";
                            }
                            
                            echo "<td>".$commande['date_commande']."</td>";
                            echo "</tr>";
                        }
                    ?>
            </tbody>
        </table>

        <br/>
        <button type="button" id="csvBtn"> Get CSV </button>
        <!-- LE CSV apparaît dans le répertoire "csv" -->
    </div>

</body>
    
    <script type="text/javascript">    

        $(document).ready(function(){

            $('#adminContent').hide();
            
            $('#loginForm').ajaxForm({ 
			url  			: 'ajax/login.php',
			type 			: 'POST',       
			success			: function(response){
                
                if(response == "OK"){
                    $('#adminAuth').hide();
                    $('#adminContent').show();
                    $('#myTable').DataTable({
                        "processing": true,
                        "serverSide": true
                    });
                } else {
                    alert("Mot de passe incorrect.");
                }
            }});

            $("#csvBtn").click(function(){
                $.post("ajax/export.php", function (response) {
                    alert(response);
                });
            })
        });

    </script>