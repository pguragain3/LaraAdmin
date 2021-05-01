use laraadmin;
create view user_role_view as select u.id,u.name,u.email,u.is_active,u.created_at,r.name as role from users u, users_roles ur,roles r where u.id = ur.user_id and ur.role_id=r.id;