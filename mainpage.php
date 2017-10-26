<!DOCTYPE html>
<html>
  <head>
    <title>Mainpage</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="main2.css">
  </head>

  <body>
    <header>
      <a href="#" id="logo">NAVY</a>
      <ul>
        <li><a href="index.php">Sign out</a></li>
        <li><a href="#">Profile</a></li>

        <!-- Appear if user - Disappear if taker -->
        <li><a href="#">Be a Taker</a></li>
        <!-- -->

        <li id="welcome"> Welcome,...</li>
      </ul>
    </header>

    <section id="taker">
      <section id="taker-offer">
        <table>
          <thead>
            <tr class="header-status">
              <th class="left top right" colspan="8">Manage Offer</th>
            </tr>
            <tr class="top">
              <th class="left taker-pet">Pet</th>
              <th class="taker-user">User</th>
              <th class="taker-start-date">Care start date</th>
              <th class="taker-end-date">Care end date</th>
              <th class="taker-price">Price</th>
              <th class="taker-location">Location</th>
              <th class="right taker-action" colspan="2">Action</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="left taker-pet"></td>
              <td class="taker-user"></td>
              <td class="taker-start-date"></td>
              <td class="taker-end-date"></td>
              <td class="taker-price"></td>
              <td class="taker-location"></td>
              <td class="taker-accept">Acc</td>
              <td class="right taker-reject">Rj</td>
            </tr>
          </tbody>
        </table>
      </section>

      <section id="pend-offer">
        <table>
          <thead>
            <tr class="header-status">
              <th class="left top right"colspan="7">Accepted Offer(Taker)</th>
            </tr>
            <tr>
              <th class="left pend-pet">Pet</th>
              <th class="pend-taker">Name</th>
              <th class="pend-start-date">Care start date</th>
              <th class="pend-end-date">Care end date</th>
              <th class="pend-price">Price</th>
              <th class="pend-location">Location</th>
              <th class="right"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="left pend-pet"></td>
              <td class="pend-taker"></td>
              <td class="pend-start-date"></td>
              <td class="pend-end-date"></td>
              <td class="pend-price"></td>
              <td class="pend-location"></td>
              <td class="btn-delete right">Del</td>
            </tr>
          </tbody>
        </table>
      </section>
    </section>

    <section id="pet">
      <table>
        <thead>
          <tr class="header-status">
            <th class="left top pet" colspan="3">Pet</th>
            <th class="right top add" colspan="3">Add</th>
          </tr>
          <tr>
            <th class="left name">Name</th>
            <th class="type">Type</th>
            <th class="description">Description</th>
            <th class="right" colspan="3">Action</th>
        </thead>

        <tbody>
          <tr>
            <td class="left name"></td>
            <td class="type"></td>
            <td class="top description"></td>
            <td class="edit">Edit</td>
            <td class="delete">Delete</td>
            <td class="make-offer right">Make offer</td>
          </tr>
        </tbody>
      </table>
    </section>

    <div class="btn btn-offer">See Offer</div>

    <section id="offer">
      <section id="pend-offer">
        <table>
          <thead>
            <tr class="header-status">
              <th class="left top right"colspan="7">Pending Offer</th>
            </tr>
            <tr>
              <th class="left pend-pet">Pet</th>
              <th class="pend-taker">Taker</th>
              <th class="pend-start-date">Care start date</th>
              <th class="pend-end-date">Care end date</th>
              <th class="pend-price">Price</th>
              <th class="pend-location">Location</th>
              <th class="right"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="left pend-pet"></td>
              <td class="pend-taker"></td>
              <td class="pend-start-date"></td>
              <td class="pend-end-date"></td>
              <td class="pend-price"></td>
              <td class="pend-location"></td>
              <td class="btn-delete right">Del</td>
            </tr>
          </tbody>
        </table>
      </section>

      <section id="acc-offer">
        <table>
          <thead>
            <tr class="header-status">
              <th class="left top right"colspan="5">Accepted Offer</th>
            </tr>
            <tr>
              <th class="left acc-pet">Pet</th>
              <th class="acc-taker">Taker</th>
              <th class="acc-start-date">Care start date</th>
              <th class="acc-end-date">Care end date</th>
              <th class="acc-rating right">Rating</th>
            </tr>
          </thead>
          <tbody>
            <tr class="first">
              <td class="left acc-pet"></td>
              <td class="acc-taker"></td>
              <td class="acc-start-date"></td>
              <td class="acc-end-date"></td>
              <td class="acc-rating right"></td>
            </tr>
          </tbody>
        </table>
      </section>
    </section>



  </body>

  <script src="main.js"></script>
</html>
