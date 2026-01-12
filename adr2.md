# Decision to use React, Laravel and PostgreSQL as the Production Technology Stack

## Context and Problem Statement
I have been tasked with creating a computer-based architecture and design solution by a company called “ABC Limited” who aim to produce a Complaint Management System (CMS) which will ideally streamline complaint management and resolution for their customers.

Another big architectural decision I had to make was which technology stack I was going to use for the full production system. This was key because the chosen stack could greatly impact application performance, scalability, extensibility and security, amongst other factors.

## Considered Options
**1. Lightweight Web Stack (PHP, SQLite, HTML, CSS, Bootstrap)**  

A simplified technology stack which will allow for rapid development whilst keeping complexity to a minimum yet still displaying fundamental system functionality, this technology stack was used for my proof-of-concept development.

**2. Full Production Web Application Stack (React, Laravel, PostgreSQL)**  

A full production stack using a component-based front-end framework, a structured backend framework, and a robust relational database system designed to handle high concurrency and scalability requirements.


## Decision Outcome
I decided to use React, Laravel, and PostgreSQL as the proposed production technology stack for the CMS. This stack offers improved scalability, maintainability, and security compared to the lightweight stack used in the proof-of-concept.

React enables the development of a responsive user interface, Laravel provides a structured backend framework with built-in support for security considerations and PostgreSQL offers strong support for concurrency and data integrity, making it suitable for production ready applications.

The lighter technology stack was intentionally used for the proof-of-concept to minimise development overhead while still demonstrating main architectural concepts.

### Consequences
- **Good**, because the selected stack is well-suited for full production applications and aligns with the scalability, security, and maintainability requirements outlined in the case study.
- **Bad**, because the chosen production stack introduces additional complexity and a steeper learning curve compared to the lightweight technologies used in the proof-of-concept.
