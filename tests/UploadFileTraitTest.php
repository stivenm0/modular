<?php

use Illuminate\Filesystem\Filesystem;
use Modular\Modular\Traits\UploadFile;

uses(UploadFile::class);

beforeEach(function () {
    (new Filesystem)->deleteDirectory(storage_path('user-files'));
});

afterAll(function () {
    (new Filesystem)->deleteDirectory(storage_path('user-files'));
});

it('can handle requests without uploads', function () {
    $result = $this->uploadFile('');

    expect($result)->toBe([]);
});

it('can handle requests with wrong inputs', function () {
    request('file', 'not an uploaded file');

    $result = $this->uploadFile('file');

    expect($result)->toBe([]);
});
