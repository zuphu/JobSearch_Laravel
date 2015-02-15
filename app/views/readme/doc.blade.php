<html>
  <head>
  </head>
  <body>
    <h1>Documentation (RTFM)</h1>
    <table>
      <tr>
        <td>Name:</td><td>Anthony Guevara </td>
      </tr>
      <tr>
        <td>id:</td><td>s2877416</td>
      </tr>
      <tr>
        <td>date:</td><td>02 June 2014</td>
      </tr>
    </table>

    <h2>Database Design:</h2>
    <pre>
CREATE TABLE "applications" ("id" integer not null primary key autoincrement, "applicationletter" varchar not null, "dateofapplication" datetime not null, "user_id" integer not nu
ll, "job_id" integer not null, "created_at" datetime not null, "updated_at" datetime not null);                                                                                    
CREATE TABLE "jobs" ("id" integer not null primary key autoincrement, "title" varchar not null, "description" varchar not null, "location" varchar not null, "salary" integer not n
ull, "startingdate" date not null, "endingdate" date not null, "user_id" integer not null, "created_at" datetime not null, "updated_at" datetime not null);                        
CREATE TABLE "migrations" ("migration" varchar not null, "batch" integer not null);                                                                                                
CREATE TABLE "users" ("id" integer not null primary key autoincrement, "email" varchar not null, "password" varchar not null, "firstname" varchar not null, "lastname" varchar not 
null, "category" varchar not null, "phonenumber" varchar not null, "remember_token" varchar not null, "created_at" datetime not null, "updated_at" datetime not null, "image_file_n
ame" varchar null, "image_file_size" integer null, "image_content_type" varchar null, "image_updated_at" datetime null);                                                           
CREATE UNIQUE INDEX users_email_unique on "users" ("email");                                                                                                                       
CREATE INDEX users_password_index on "users" ("password");  
    </pre>
    <h2>Limitations</h2>
    None. There are no limits.

    <h1>Usage:</h1>
    <p>A person can register on the home page using the register link. A user can sign up as either a job
    seeker or job employer. If you sign up as an employer you can post jobs for job seekers to apply to.
    As an employer you can also view all the applicants who have applied to your job.
      If you sign up as a job seeker you can view and apply to jobs.</p>
    
    employers home page:<br/>
    {{ link_to_route('employer.index', '/assign2/public/employer') }}<br/>
    users home page:<br/>
    {{ link_to_route('jobseeker.index', '/assign2/public/jobseeker') }}<br/>
    <table border="1px">
      <tr>
        <th>Email:</th><th>Password:</th><th>Account Type</th>
      </tr>
      <tr>
        <td>a@a.com</td><td>a</td><td>Employer</td>
      </tr>
      <tr>
        <td>b@b.com</td><td>b</td><td>Employer</td>
      </tr>
      <tr>
        <td>c@c.com</td><td>c</td><td>Job Seeker</td>
      </tr>
      <tr>
        <td>d@d.com</td><td>d</td><td>Job Seeker</td>
      </tr>
    </table>

    <h2>Describe which (if any) requirements weren't implemented and why.</h2>
    All were implemented (as far as I know..). We'll soon find out!
    <h2>Describe which (if any) features do not work properly and why.</h2>
    All were implemented (as far as I know..). We'll soon find out!
    <h2>Describe which (if any) additional features were implemented.</h2>
    <em>Growl!</em>
    <h2>Describe what usability testing was performed and how and what you learned
    and what changes you made as a result.</h2>
    Testing incrementally by creating user accounts and visually inspecting how 
    sections looked. If looked horrible and difficult to use, I made them more visually appealing.
    User experience is important and having a site which is easy to navigate and obvious to use
    enhances this.
    <hr>
    &copy;RIP 2503ICT 2014
  </body>
</html>