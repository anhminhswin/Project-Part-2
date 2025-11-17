<?php
    $currentPage = 'about';
    $pageTitle = 'About Our Team | Nexora IT Solutions';
?>
<?php include 'header.inc'; ?>

    <main>
        <section class="section" aria-labelledby="team-heading">
            <div class="wrapper">
                <h1 id="team-heading">COS10026 Group 8</h1>
                <p class="group-ids">Student ID: 105975035 - SWH03439</p>
                <p class="group-ids">Student ID: 106211785 - SWH03072</p>
                <figure class="team-figure">
                    <img src="images/portrait.jpg" alt="Portrait of Quang Bui">                  
                    <img src="images/anhminh.jpeg" alt="Portrait of Anh Minh">
                     <figcaption>Team Nexora Pioneers</figcaption>
                </figure>
                <h2>Group Overview</h2>
                <ul>
                    <li>Group Name: Nexora Pioneers
                        <ul>
                            <li>Class: COS10026 Web Technology Project</li>
                            <li>Class time: Friday 14:00 - 17:00</li>
                        </ul>
                    </li>
                    <li>Tutor: Gia Binh Vu</li>
                </ul>

                <h2>Member Contributions</h2>
                <table class="contributions-table">
                    <thead>
                        <tr>
                            <th scope="col">Member</th>
                            <th scope="col">Area</th>
                            <th scope="col">Contributions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" rowspan="4">Quang Bui<br>(105975035 - SWH03439)</th>
                            <td>Project Part 2 - Server-Side Development</td>
                            <td>
                                <ul>
                                    <li>Built HR management system with authentication, filtering, and CRUD operations (manage.php)</li>
                                    <li>Converted static jobs page to dynamic database-driven content (jobs.php)</li>
                                    <li>Added security features including login attempt tracking and account lockout</li>
                                    <li>Implemented data sanitization and validation for all user inputs</li>
                                    <li>Fixed connection issues and server-side debugging (settings.php configuration)</li>
                                    <li>Resolved undefined variable errors and server issues</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Features Implemented</td>
                            <td>
                                <ul>
                                    <li>Complete EOI application workflow with confirmation system</li>
                                    <li>Advanced HR management interface with sorting and filtering</li>
                                    <li>Manager registration and authentication system</li>
                                    <li>Dynamic job reference loading in application form</li>
                                    <li>Comprehensive error handling and user feedback</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Design & UI/UX</td>
                            <td>
                                <ul>
                                    <li>Added hero banner background (banner2.jpg)</li>
                                    <li>Fixed enhancement display issues for better readability</li>
                                    <li>Improved about page layout and styling</li>
                                    <li>Added new pages to navigation bar for better site structure</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Documentation & Enhancements</td>
                            <td>
                                <ul>
                                    <li>Created and documented project enhancements page</li>
                                    <li>Added project concept documentation</li>
                                    <li>Version control management and commit history</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" rowspan="4">Anh Minh<br>(106211785 - SWH03072)</th>
                            <td>Project Part 2 - Database & Core Development</td>
                            <td>
                                <ul>
                                    <li>Designed and implemented MySQL database schema for EOI and jobs tables</li>
                                    <li>Created EOI table with auto-incrementing primary key and status tracking</li>
                                    <li>Implemented Jobs table for dynamic job listing management</li>
                                    <li>Proper data types and constraints for data integrity</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Server-Side Development</td>
                            <td>
                                <ul>
                                    <li>Created PHP include files (header.inc, footer.inc) for code reusability</li>
                                    <li>Developed database connection configuration (settings.php)</li>
                                    <li>Implemented EOI form processing with comprehensive server-side validation (process_eoi.php)</li>
                                    <li>Implemented data sanitization and validation for all user inputs</li>
                                    <li>Initial project setup and repository initialization</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Form Development & Testing</td>
                            <td>
                                <ul>
                                    <li>Created and refined apply.php application form</li>
                                    <li>Extensive troubleshooting of apply.php functionality (multiple iterations)</li>
                                    <li>Fixed form validation and submission issues</li>
                                    <li>Completed EOI (Expression of Interest) system integration</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Content & Documentation</td>
                            <td>
                                <ul>
                                    <li>Created and refined about.php team information page (multiple fixes)</li>
                                    <li>Added team member information and project details</li>
                                    <li>Iterative improvements and bug fixes throughout development</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h2>Team Interests</h2>
                <!-- AI Generated content -->
                <table class="team-table">
                    <caption>Shared Interests and Expertise</caption>
                    <thead>
                        <tr>
                            <th scope="col">Member</th>
                            <th scope="col">Primary Interest</th>
                            <th scope="col">Secondary Focus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Quang Bui</th>
                            <td>Pickleball</td>
                            <td>Music</td>
                        </tr>
                        <tr>
                            <th scope="row">Anh Minh</th>
                            <td>Guitar</td>
                            <td>Music</td>
                        </tr>
                        <tr>
                            <th scope="row">Collective Goal</th>
                            <td colspan="2">Build resilient, human-centric technology that empowers Vietnamese enterprises.</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

<?php include 'footer.inc'; ?>