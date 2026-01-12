# Decision to Externalise Communication Channels from the CMS

## Context and Problem Statement
I have been tasked with creating a computer-based architecture and design solution by a company called “ABC Limited” who aim to produce a Complaint Management System (CMS) which will ideally streamline complaint management and resolution for their customers.

A key architectural decision was required regarding whether these communication channels should be implemented directly within the CMS or treated as external systems integrated with the main application.

## Considered Options
**1. Internal Communication Handling**  

Implementing email handling, telephone logic, and future chatbot functionality directly within the CMS codebase.

**2. External Communication Systems Integration**  

Treating email systems, telephone systems (CTI/IVR), and chatbot services as external systems that integrate with the CMS separately.

## Decision Outcome
I decided to model communication channels as external systems that integrate with the CMS rather than embedding them directly within the application. This allows each communication channel to change independently of the CMS.

By externalising these systems, the CMS can focus on complaint lifecycle management while relying on specialised systems to handle communication and attempted chatbot problem resolution. This design also allows these external systems to be replaced or upgraded without requiring significant changes to the main application.

### Consequences
- **Good**, because it supports future extensibility, particularly the planned chatbot integration.
- **Bad**, because integration with external systems introduces additional dependencies.
