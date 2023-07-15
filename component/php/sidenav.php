<style>
.side__menu {
  background-color: black;
  display: flex;
  flex-direction: column;
  gap: 16px;
  padding: 12px 0;
  width: fit-content;
}

.side__menu a {
  color: white;
  text-shadow: 0 0 20px 9px #ff61241f;
  text-decoration: none;
}

.side__menu h3 {
  padding: 12px 32px;
  color: white;
}

.side__menu a {
  text-decoration: none;
  color: #222;
}

.side__menu h3 {
  font-size: 1rem;
}

.side__menu a:hover {
  color: gray;
}

.active {
  color: white;
  text-shadow: 0 0 3px #bcbcbc;
}

/* Responsive Styles */
@media screen and (max-width: 768px) {
  .side__menu {
    display: block;
    width: 50px;
  }

  .side__menu h3 {
    padding: 5px;
    font-size: 0.5rem;
  }

  
}
</style>

<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="side__menu">
  <a href="profile.php" class="<?= ($currentPage == 'profile.php') ? 'active' : ''; ?>"><h3>Profile</h3></a>
  <a href="history.php" class="<?= ($currentPage == 'history.php') ? 'active' : ''; ?>"><h3>History</h3></a>
  <a href="changepass.php" class="<?= ($currentPage == 'changepass.php') ? 'active' : ''; ?>"><h3>Change<br>Password</h3></a>
  <a href="index.php?logout=<?=$_SESSION['user_id']?>"><h3>Logout</h3></a>
</div>
