<table border="2" width="100%" cellpadding="2" cellspacing="0">
	<tr>
		<td>
<!--Центральный фрейм -->
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
				<tr>
					<td align="center">Поиск</td>
				</tr>
				<tr>
					<td>Путь</td>
				</tr>
				<tr>
					<td><b>{$cat_name}</b></td>
				</tr>
				<tr>
					<td>Сортировка по вендорам</td>
				</tr>
				<tr>
					<td>Сортировка по ценам</td>
				</tr>
				<tr>
					<td>
<!--Отображение каталога-->
						<table width="100%" border="2" width="" cellpadding="2" cellspacing="0">
						<tr>
							<td><b>Наименование</b></td>
							<td><b>Цена, грн.</b></td>
							<td><b>Цена, usd</b></td>							
							<td><b>Гарантия</b></td>
							<td><b>Наличие</b></td>
							<td><b>Дата</b></td>
							<td><b>Продавец</b></td>
						</tr>
						{foreach from=$positions item=p}
							<tr>
								<td>{$p.goods_name} {$p.description}</td>
								<td>{$p.price_ua}</td>
								<td>{$p.price_usd}</td>
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