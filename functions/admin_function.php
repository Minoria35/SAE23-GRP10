<?php

    function showUsers(){
        $json = json_decode(file_get_contents('../data/users.json'), true);

        echo '<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nom d\'utilisateur</th>
                        <th scope="col">Mot de passe</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($json as $user) {
            $username = $user['username'];
            echo '<tr>
                    <td>' . $username . '</td>
                    <td>' . $user['password'] . '</td>
                    <td>' . " ", $user['role'] . '</td>
                    <td>
                        <button type="button" class="btn btn-primary edit-user-btn" data-bs-toggle="modal" data-bs-target="#edit-user-modal" data-username="' . $username . '">Modifier</button>
                        <a href="../functions/admin_function/delete_user.php?username=' . $username . '">Supprimer</a>
                    </td>
                </tr>';
        }
    
        echo '</tbody>
        </table>';

        //Popup de modification d'utilisateur
        echo '
        <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier l\'utilisateur</h5>
              </div>
              <form action="../functions/admin_function/edituser_traitement.php" method="post">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="username">Nom d\'utilisateur</label>
                    <input type="text" class="form-control" id="username" name="username" value="" readonly>
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe">
                  </div>
                  <div class="form-group">
                    <label for="password2">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirmer le nouveau mot de passe">
                  </div>
                  <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Adresse email">
                  </div>
                  <div class="form-group">
                    <label for="role">Rôle</label>
                    <select class="form-control" id="role" name="role">
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
              </form>
            </div>
          </div>
        </div>';

        echo '
        <script>
            const editUserBtns = document.querySelectorAll(\'.edit-user-btn\');
            const usernameInput = document.getElementById(\'username\');
        
            editUserBtns.forEach(btn => {
                btn.addEventListener(\'click\', () => {
                    const username = btn.getAttribute(\'data-username\');
                    usernameInput.value = username;
                });
            });
        </script>
        ';
    }

?>