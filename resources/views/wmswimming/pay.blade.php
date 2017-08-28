@extends('layouts.wm')

@section('content')
<div class="container">
	<div class="page js_show">
		<div class="page__hd">
			<h1 class="page__title">订单支付</h1>
			<p class="page__desc">网民全民健身游泳比赛报名</p>
		</div>

		<div class="page__bd">
			<div class="weui-form-preview">
		        <div class="weui-form-preview__hd">
		            <div class="weui-form-preview__item">
		                <label class="weui-form-preview__label">付款金额</label>
		                <em class="weui-form-preview__value">¥{{$ticket->group->price}}.00</em>
		            </div>
		        </div>
		        <div class="weui-form-preview__bd">
		            <div class="weui-form-preview__item">
		                <label class="weui-form-preview__label">报名项目</label>
		                <span class="weui-form-preview__value">{{ $ticket->group->name }}</span>
		            </div>
		            @if($ticket->group->team_required)
			            @foreach($ticket->registion->registions as $registion)
			            <div class="weui-form-preview__item">
			                <label class="weui-form-preview__label">@if($loop->first)参赛人员@endif</label>
			                <span class="weui-form-preview__value">{{ $registion->realname }}</span>
			            </div>
			            @endforeach
		            @else
		            	<div class="weui-form-preview__item">
			                <label class="weui-form-preview__label">参赛人员</label>
			                <span class="weui-form-preview__value">{{ $ticket->registion->realname }}</span>
			            </div>
		            @endif
		            <div class="weui-form-preview__item">
		                <label class="weui-form-preview__label">收费规则</label>
		                <span class="weui-form-preview__value">每人每项20元</span>
		            </div>
		        </div>
		    </div>


			<div class="weui-btn-area">
	            <a href="/success" class="weui-btn weui-btn_primary">微信支付</a>
	        </div>
		</div>
	</div>
</div>
@endsection
