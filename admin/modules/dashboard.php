<style type="text/css">
	.statistic {
		background: white;
		margin-top: 10px;
		border-radius: 5px;
		box-shadow: 3px 0px 9px #88888882;

	}

	.statistic_grid {
		padding: 30px 30px 50px 30px;
	}

	.statistic_title {
		padding-bottom: 15px;
		margin: 0;
		font-size: 21px;
	}

	.statistic_select {
		margin: 0;
		padding-bottom: 15px;
	}

	.select-date {
		width: 120px;
		height: 30px;
	}

	#text-date {
		color: #666;
		font-weight: bold;
	}

	#chart {
		height: 400px;
	}
</style>
<div class="statistic">
	<div class="statistic_grid">
		<p class="statistic_title">Thống kê đơn hàng <span id="text-date"></span></p>
		<p class="statistic_select">
			<select class="select-date">
				<option value="7ngay">7 ngày qua</option>
				<option value="28ngay">28 ngày qua</option>
				<option value="90ngay">90 ngày qua</option>
				<option value="365ngay">365 ngày qua</option>
			</select>
		</p>
		<div id="chart" style="height: 250px;"></div>
	</div>
</div>