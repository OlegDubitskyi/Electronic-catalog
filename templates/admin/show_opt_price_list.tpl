<table border="2" width="100%" cellpadding="2" cellspacing="0">
	<tr>
		<td>
<!--Центральный фрейм -->
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
				<tr>
					<td align="center">Поиск</td>
				</tr>
				<tr>
					<td>
{* Отображение пути к категории*}					
					{foreach name=path from=$cat_path item=path}
						{if $smarty.foreach.path.last}
							{$path.cat_name}
						{else}
							<a href="index.php?cmd=open_c&cat_id={$path.cat_id}">{$path.cat_name}</a> »
						{/if}
					{/foreach}										
					</td>
				</tr>
				<tr>
					<td><b>{$cat_name}</b></td>
				</tr>
				<tr>
					<td>Вендоры:
						<a href="index.php?cmd=open_c&cat_id={$cat_id}">Все</a>
					{foreach name=v from=$vendors item=v}
						{if $smarty.foreach.v.first}
							<a href="index.php?cmd=open_c&vendor_id={$v.id}&cat_id={$v.cat_id}">{$v.vendor_name}</a>
						{else}
							,<a href="index.php?cmd=open_c&vendor_id={$v.id}&cat_id={$v.cat_id}">{$v.vendor_name}</a>
						{/if}					
					{/foreach}
					</td>
				</tr>
				<tr>
					<td>
						<table border="1" cellpadding="2" cellspacing="0">
							<tr>
								<td>Разбиение по страницам</td>
								<td>
									<a href="index.php?cmd=open_c&cat_id={$cat_id}&pt=r">розница</a>
									<a href="index.php?cmd=open_c&cat_id={$cat_id}&pt=o">опт</a>
								</td>
							</tr>
						</table>
					
					</td>
				</tr>
				<tr>
					<td>
<!--Отображение каталога-->
						<table width="100%" border="2" width="" cellpadding="2" cellspacing="0">
						<tr>
							<td><b>Наименование</b></td>
							<td><b>Опт, грн.</b></td>
							<td><b>Опт, usd</b></td>							
							<td><b>Гарантия, мес</b></td>
							<td><b>Наличие</b></td>
							<td><b>Дата</b></td>
							<td><b>Продавец</b></td>
						</tr>
						{foreach from=$positions item=p}
							<tr>
								<td width=250>{$p.vendor_name} {$p.goods_name} {$p.description}</td>
								<td>{$p.price_opt_ua}</td>
								<td>{$p.price_opt_usd}</td>
								<td>{$p.guarantee}</td>
								<td>{$p.availability}</td>
								<td>{$p.insert_date}</td>
								<td>{$p.company_name}</td>
							</tr>
						{/foreach}
						</table>
<!--/Отображение каталога-->						
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>