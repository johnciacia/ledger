<div class="row">
  <div class="col-md-12 table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Date</th>
          <th>Amount</th>
          <th>Cost</th>
          <th>Value</th>
          <th>Profit</th>
          <th class="hidden-xs">% Profit</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $transfers->transfers as $t )
          <?php $initial_cost = $t->total->amount / $t->btc->amount; ?>
          <?php $profit = ( $t->btc->amount * $rate) - $t->total->amount; ?>
          <tr class="expand">
            <td>
              @if( $t->type == 'Sell' )
                <i class="fa fa-angle-left"></i>
              @else
                <i class="fa fa-angle-right"></i>
              @endif
              <span class="hidden-xs"><?php echo date( 'F j, Y', strtotime( $t->created_at ) ); ?></span>
              <span class="visible-xs"><?php echo date( 'M. jS', strtotime( $t->created_at ) ); ?></span>
            </td>
            <td>{{{ $t->btc->amount }}}</td>
            <td>
              @if( $t->type == 'Sell' )
                @money( $t->total->amount * -1 ) 
              @else
                @money( $t->total->amount )
              @endif
            </td>
            <td>@money( $t->btc->amount * $rate )</td>
            <td>
              @if ($profit > 0 )
                <span class="label label-success">@money( $profit )</span>
              @else
                <span class="label label-danger">@money( $profit )</span>
              @endif
            </td>
            <td class="hidden-xs"><?php echo round( $profit / ( $t->total->amount *  $t->btc->amount ), 1 ); ?>%</td>
          </tr>
          <tr class="collapse out">
            <td colspan="6">
              <p class="description">{{{ $t->description }}}</p>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>

<script>
  jQuery(document).ready(function() {
    $('tr.expand').on('click', function(e) {
      $(this).next('tr').toggleClass('collapse')
    });
  });
</script>
