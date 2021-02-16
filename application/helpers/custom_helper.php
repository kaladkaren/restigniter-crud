<?php

/**
* returns the api url
* @param  object $class    the `$this` object
* @return string           example: http://localhost/restigniter-crud/api/crud/27
*
* @author: @jjjjcccjjf
*/
function api_url($class)
{
  return base_url() . "api/" . strtolower(get_class($class)) . "/";
}

function getAreas($that)
{
  $that->db->order_by('area_name', 'asc');
  return $that->db->get('areas')->result();
}

function getStaff($that)
{
  $that->db->order_by('name', 'asc');
  $that->db->where('user_type', 'Staff');
  return $that->db->get('admin')->result();
}
