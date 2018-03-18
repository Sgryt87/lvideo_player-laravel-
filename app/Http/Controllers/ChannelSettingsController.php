<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ChannelUpdateRequest;

class ChannelSettingsController extends Controller {

	public function edit( Channel $channel ) {
		$this->authorize( 'edit', $channel );

		return view( 'channel.settings.edit',
			[ 'channel' => $channel ] );
	}

	public function update( ChannelSettingsController $request, Channel $channel ) { // ChannelSettingsController goes
		// here todo
		$this->authorize( 'update', $channel );
		$channel->update( [
			'name'        => $request->name,
			'slug'        => $request->slug,
			'description' => $request->description,
		] );

		return redirect()->back()->to( "/channel/{$channel->slug}/edit" );
	}

//	public function message() {
//		return [
//			'slug.unique' => 'That unique URL has been taken.',
//		];
//	}
}
