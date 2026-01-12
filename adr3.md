# Decision to use an External Identity Provider for Authentication

## Context and Problem Statement
I have been tasked with creating a computer-based architecture and design solution by a company called “ABC Limited” who aim to produce a Complaint Management System (CMS) which will ideally streamline complaint management and resolution for their customers.

A key decision was required regarding whether authentication should be handled internally by the CMS or delegated to an external Identity Provider using more professional authentication techniques.

## Considered Options
**1. Application-Managed Authentication**  

Authentication handled entirely within the CMS using locally stored user credentials and role-based authentication.

**2. External Identity Provider (SSO)**  

Authentication delegated to an external Identity Provider, allowing users to authenticate using their organisation’s existing credentials and security policies.

## Decision Outcome
I decided to design the CMS to integrate with an external Identity Provider using Single Sign-On (SSO). This approach is more suitable for real-world applications and significantly improves the security of the system.

Using an external Identity Provider system allows authentication responsibilities, such as password management and multi-factor authentication, to be handled outside the CMS, which reduces the risk of security issues. In my proof-of-concept I implemented rudimentary authentication to demonstrate how authentication could potentially work in the application, the architecture supports future integration with an external identity provider system, which will ideally be implemented in the full production system.

### Consequences
- **Good**, because authentication is delegated to systems specifically designed to handle identity and security concerns.
- **Bad**, because integration with an external Identity Provider introduces additional configuration and external dependency.
