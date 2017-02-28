<html>
<!--CHANGELOG
	Created Class, basic replication of customers class - 1/26/2017
	Added basic interface to existent code - 1/31/2017
	Formatted code with proper indenting  - 2/1/2017
-->
<!--
  @author Kwabena Boohene
  @desc - This page displays employee data based on search input in a table format.
-->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employees</title>
    <link rel="stylesheet" href="Css/foundation.min.css">
    <link rel="stylesheet" href="Css/Style.css">
     <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
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
      {assign var="result" value=$employee->searchEmployee($txt)}
      {assign var="data" value=$employee->fetchDB($result)}

    {elseif ($smarty.request.txtSearch)==""}
      {assign var="result" value=$employee->searchEmployee()}
      {assign var="data" value=$employee->fetchDB($result)}

    {/if}
  {else}
    {assign var="result" value=$employee->getEmployee()}
    {assign var="data" value=$employee->fetchDB($result)}
  {/if}

{*Creates a table if data is contained*}
<div class='row'>
  <div class='large-10 columns'>
    <table>
      <thead>
        <tr>
          <td>Enumber</td>
          <td>Ename</td>
          <td>Zip Code</td>
          <td>Hire date</td>
        </tr>
      </thead>

        {foreach from=$data item=value}
          <tr>
            {if $value.eno}
              <td>{$value.eno}</td>
            {/if}
            {if $value.ename}
              <td>{$value.ename}</td>
            {/if}
            {if $value.zip}
              <td>{$value.zip}</td>
            {/if}
            {if $value.hdate}
              <td>{$value.hdate}</td>
            {/if}
          </tr>
        {/foreach}

    </table>
  </div>
</div>
<div class='row'>
      <div class='large-6 columns'>
        <div class="ct-chart ct-perfect-fourth"></div>
          {assign var="countData" value=$employee->countEmployees()}
          <script>
            new Chartist.Bar('.ct-chart', {
                labels: ['Employee','Customer'],
                series: [{$countData.Num_Employees},{$countData.1.Num_Customers}]
              }, {
                distributeSeries: true
              });
          </script>
        </div>

        <div class="large-6 columns">
         <div class="ct-chart1 ct-perfect-fourth"></div>
          <script>
            var data = {
                series: [{$countData.Num_Employees},{$countData.1.Num_Customers}]
              };

            var sum = function(a, b) { return a + b };

            new Chartist.Pie('.ct-chart1', data, {
              labelInterpolationFnc: function(value) {
                return Math.round(value / data.series.reduce(sum) * 100) + '%';
              }
            });
          </script>
        </div>
    </div>
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
