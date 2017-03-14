<html>
  <head>
    <title>
      Customer Orders
    </title>
  </head>
  <body>
    {**{assign var="customerId" value=$smarty.session.id}**}
    {assign var="customerId" value=10}
    {assign var="result" value=$order->getCustomerOrders($customerId)}
    {assign var="data" value=$order->fetchDB($result)}
    <table>
      <thead>
        <tr>
          <td>Order Number</td>
          <td>Customer Number</td>
          <td>Recieved </td>
          <td>Shipped date</td>
          <td>Created At</td>
        </tr>
      </thead>

            {foreach from=$data item=value}
              <tr>
                {if $value.ono}
                  <td>{$value.ono}</td>
                {/if}
                {if $value.cno}
                  <td>{$value.cno}</td>
                {/if}
                {if $value.received}
                  <td>{$value.received}</td>
                {/if}
                {if $value.shipped}
                  <td>{$value.shipped}</td>
                {/if}
                {if $value.created_at}
                  <td>{$value.created_at}</td>
                {/if}
              </tr>
            {/foreach}

        </table>
  </body>
</html>
