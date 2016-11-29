<div id="featured-products">
	
	<h3 class="title-cursive">Productos Destacados</h3>
	
	<script type="text/html" data-template="featured-products">
	  %{items}
	    <li class="">
	    	<div class="inner">
			      %{hasImage}
			      <div class="image-centerer">
			        <a href="%{ href }" class="product-image" title="%{ title }">
			          <img src="%{ image.sizes.small  }" />
			        </a>
			      </div>
			      %{/hasImage}
			      <h2 class="product-model">
					<a class="title" title="%{ title }" href="%{ href }">%{ title }</a>
				  </h2>
				  
				   %{hasType}
			        <p class="type">%{ type.name }</p>
			       %{/hasType}
		
			      %{hasPrice}
			      <p class="prices">
			          <span class="price">$%{ formatted_price }</span>
			           %{hasPrice_comparison}
				       <span class="price_comparison"><strike>$%{ price_comparison }</strike></span>
				       %{/hasPrice_comparison}
			      </p>
			      %{/hasPrice}
			      
			      <div class="buttons-bottom">
				      <a class="btn-product" href="%{ href }"> Ver Producto</a>
				  </div>
		  
		  	</div>
	      
	    </li>
	  %{/items}
	</script>
	

	<?php //See http://bootic.github.io/bootic_search_widget.js for more options and examples ?>
	<ul id="products-item" class="small-block-grid-2 medium-block-grid-3" 
	  data-bootic_widget="ProductSearch" 
	  data-template="featured-products" 
	  data-config_per_page="3" 
	  data-config_collections="featured" 
	  data-config_shop_subdomains="ahumadores"  
	  data-autoload="true">
	</ul>	
	
</div>
