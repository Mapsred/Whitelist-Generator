<?php

/**
 * Get UUID from Username
 *
 * @param  string       $username
 * @return string|bool  UUID (without dashes) on success, false on failure
 */ 
function username_to_uuid($username) {

    if (strlen($username) >= 3 and strlen($username) <= 16 and ctype_alnum(str_replace('_', '', $username))) {

        $json = file_get_contents('https://api.mojang.com/users/profiles/minecraft/' . $username);
        if (empty($json)) {
            return false;
        }

        $data = json_decode($json, true);

        if (is_array($data) and !empty($data) and isset($data['id'])) {
            return $data['id'];
        }

    }

    return false;
}

/**
 * Get Username from UUID
 *
 * @param  string       $uuid
 * @return string|bool  Username on success, false on failure
 */ 
function uuid_to_username($uuid) {

    if (strlen($uuid) >= 32 and strlen($uuid) <= 36 and ctype_alnum(str_replace('-', '', $uuid))) {

        $json = file_get_contents('https://api.mojang.com/user/profiles/' . str_replace('-', '', $uuid) . '/names');

        if (empty($json)) {
            return false;
        }

        $data = json_decode($json, true);

        if (is_array($data) and !empty($data)) {

            $last = array_pop($data);
            if (is_array($last) and isset($last['name'])) {
                return $last['name'];
            }

        }

        return false;

    }
}

/**
 * Remove dashes from UUID
 *
 * @param  string  $uuid
 * @return string  UUID without dashes
 */ 
function minify_uuid($uuid) {
    return str_replace('-', '', $uuid);
}

/**
 * Add dashes to an UUID
 *
 * @param  string  $uuid
 * @return string  UUID with dashes
 */ 
function format_uuid($uuid) {
    return substr($uuid, 0, 8) . '-' . substr($uuid, 8, 4) . '-' . substr($uuid, 12, 4) . '-' . substr($uuid, 16, 4) . '-' . substr($uuid, 20, 12);
}
