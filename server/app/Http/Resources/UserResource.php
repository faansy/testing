<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'user_image_url' => $this->user_image_url,
            'user_background_image_url' => $this->user_background_image_url,
            'last_seen' => $this->last_seen,
            'show_activity_status' => $this->show_activity_status,
            'free_subscription' => $this->free_subscription,
            'subscription_amount' => $this->subscription_amount,
            'show_subscription_offers' => $this->show_subscription_offers,
            'verified' => $this->verified,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'profile' => [
                'id' => $this->profile->id,
                'bio' => $this->profile->bio,
                'address' => $this->profile->address,
                'website_url' => $this->profile->website_url,
                'twitter_account' => $this->profile->twitter_account,
                'google_account' => $this->profile->google_account,
                'dark_mode' => $this->profile->dark_mode,
            ],
            // 'profile' => ProfileResource::collection($this->profile),
            'role' => [
                'id' => $this->role->id,
                'title' => $this->role->title,
            ],
            'userlikers' => $this->userlikers,
            'subscribers' => $this->subscribers,
            // 'posts' => $this->posts,
            'posts' => PostResource::collection($this->posts),
            'postcomments' => $this->postcomments,
            'postlikes' => $this->postlikes,
            'streams' => $this?->streams,
            'streamcomments' => $this?->streamcomments,
            'streamlikes' => $this?->streamlikes,
        ];
    }
}
