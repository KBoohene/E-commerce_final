{if isset($smarty.request.export)}
  {$customer->csvExportCData()}
{/if}
<html>
<!--CHANGELOG
	Created Class - 1/25/2017
	Added filter number to separate employees from customer -1/26/2017
	Added basic user interface - 2/1/2017
	Formatted code with proper indenting and comments -2/1/2017
-->
<!--
  @author Kwabena Boohene
  @desc - This page displays customer data based on search input in a table format.
-->

	<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Customers</title>
      <link rel="stylesheet" href="Css/foundation.min.css">
      <link rel="stylesheet" href="Css/Style.css">

  </head>


  <body>
    <div class="top-bar" id="example-animated-menu" data-animate="hinge-in-from-top spin-out">
        <div class="top-bar-left">
          <ul class="dropdown menu" id="top-navi" data-dropdown-menu>
            <li class="menu-text">Site Title</li>
            <li>
              <a href="#">One</a>
              <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
              </ul>
            </li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
          </ul>
        </div>
      </div>

       <div id="divContent">
          <form action="" method="GET">
            <div class="row">
              <div class="large-12 columns">
                <div class="row collapse">
                  <div class="small-10 columns">
                    <input class="search-bar" id="search" type="text" name="txtSearch">
                  </div>
                  <div class="small-2 columns">
                    <button type="submit" class="button">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
      </div>

    {if isset($smarty.request.txtSearch)}
      {if ($smarty.request.txtSearch)!=""}
        {assign var="txt" value=$smarty.request.txtSearch}
        {assign var="data" value=$customer->fetch_CData($txt)}

      {elseif ($smarty.request.txtSearch)==""}
        {assign var="data" value=$customer->fetch_CData()}

      {/if}
    {else}
      {assign var="data" value=$customer->fetch_CData()}
    {/if}

    {*Creates a table if data is contained*}
    <div class='row'>
      <div class='large-10 columns'>
        <table>
          <thead>
            <tr>
              <td>Cnumber</td>
              <td>Cname</td>
              <td>Street</td>
              <td>Zip Code</td>
              <td>Phone Number</td>
            </tr>
          </thead>

            {foreach from=$data item=value}
              <tr>
                {if $value.cno}
                  <td>{$value.cno}</td>
                {/if}
                {if $value.cname}
                  <td>{$value.cname}</td>
                {/if}
                {if $value.street}
                  <td>{$value.street}</td>
                {/if}
                {if $value.zip}
                  <td>{$value.zip}</td>
                {/if}
                {if $value.phone}
                  <td>{$value.phone}</td>
                {/if}
              </tr>
            {/foreach}

        </table>
      </div>
    </div>

 <a href="customer.php?export=" class="button">Export Data</a>

    <div class="footer">
      <div class="row">
        <div class="large-4 columns">
          <h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
          <p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
        </div>
        <div class="large-3 large-offset-2 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
        <div class="large-3 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
      </div>
    </div>

    <script src="JS/jquery.js"></script>
    <script src="JS/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>

  </body>
</html>
