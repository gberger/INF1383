CREATE DATABASE cadvol; -- PROBABLY WILL RETURN ERROR

\c cadvol

DROP SCHEMA IF EXISTS public CASCADE;

CREATE SCHEMA public;

\i structure.sql
\i data.sql
\i misc.sql