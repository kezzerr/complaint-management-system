# Decision to use a Layered Monolithic Architecture

## Context and Problem Statement
I have been tasked with creating a computer-based architecture and design solution by a company called “ABC Limited” who aim to produce a Complaint Management System (CMS) which will ideally streamline complaint management and resolution for their customers.

The first key architectural decision I had to make was whether to employ a monolithic or microservice style architecture. This decision was pivotal and had to factor in how suitable the style was to meet certain requirements and its feasibility in terms of the development of a working proof-of-concept.

## Considered Options
**1. Layered Monolithic Architecture** 

A traditional software model with one contained codebase but with discrete layers (application, business, persistence) which establishes a separation of concerns.

**2. Microservices Architecture** 

A collection of small services which are deployed independently, these services have their own business logic and separate codebases. 

## Decision Outcome
Ultimately, I decided to opt for a Layered Monolithic Architecture due to its simplicity where developing is concerned, the fact that the system will be a lot more maintainable and easier to debug/test if issues arise and it being generally easier to manage than a distributed system.

### Consequences
- **Good**, because it maps more suitably to C4 diagram modelling and is appropriate for rapid prototype development  proving viability to stakeholders.
- **Bad**, because scalability relies on the entire system being scaled, microservices can independently scale select services.
