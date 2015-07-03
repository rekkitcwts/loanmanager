<div class=" sidebar">
  <ul class="nav nav-sidebar">
    <li><a href="/">Dashboard</a></li>

    @if(Auth::user()->role == 'admin')
    	<li><a href="#">Manage Accounts</a></li>
    @endif
    <li><a href="/borrowers">Borrowers</a></li>
    <li><a href="#">Loans</a></li>
    <li><a href="#">Transactions</a></li>
  </ul>
</div>
