## Proxy Pattern (OOP) - Gumballs Machine Example

We are sharing some simple PHP code, showing the use of
the [Proxy Pattern](https://en.wikipedia.org/wiki/Proxy_pattern). You will see how modern versions
of PHP, supporting Classes and Interfaces, make it easy to implement the Proxy Pattern using this language.

### About It

The Proxy pattern is a structural design pattern
in [object-oriented programming](https://en.wikipedia.org/wiki/Object-oriented_programming) that provides a surrogate or
placeholder for another object to control its access, manage its creation, or add additional behavior without modifying
the original object. It allows for the creation of an intermediary object that acts as a representative of the real
object, providing a level of indirection and adding extra functionality as needed.

### History

The Proxy pattern itself was formally documented and popularized in the influential book ["Design Patterns: Elements of
Reusable Object-Oriented Software"](https://en.wikipedia.org/wiki/Design_Patterns) by Erich Gamma, Richard Helm, Ralph
Johnson, and John Vlissides, also known as the Gang of Four (GoF). The book, published in 1994, presented the Proxy
pattern as one of the 23 fundamental design
patterns.

However, the concept of using proxies or surrogate objects predates the GoF book. The notion of surrogate objects can be
traced back to the early days of object-oriented programming. For example, in
the [Smalltalk](https://en.wikipedia.org/wiki/Smalltalk) programming language, surrogate objects called "handles" were
used to represent remote or large objects, providing a level of indirection and control over their access.

The Proxy pattern itself was influenced by the broader concept of indirection, which has a long history in computer
science and software engineering. Indirection refers to the practice of introducing an intermediary between two entities
to control or modify the interaction between them.

### Intent

The Proxy pattern aims to provide a surrogate or placeholder for an object to control and manage access to it. It allows
for transparent communication with the original object, enabling the proxy to perform additional tasks like access
control, caching, lazy initialization, logging, or remote communication.

### Structure

- **Subject:** Defines the common interface for both the RealSubject and Proxy. It specifies the operations that the
  RealSubject and Proxy should implement.
- **RealSubject:* Represents the actual object for which the Proxy provides a surrogate. It defines the real business
  logic or functionality that the Proxy aims to control or extend.
- **Proxy:** Implements the Subject interface, acting as a surrogate for the RealSubject. It manages the interaction
  with the RealSubject, providing additional functionality or controlling access to it.

### How it Works

1. The client interacts with the Proxy object through the common Subject interface.
2. The Proxy receives the client's request and can perform additional tasks before or after delegating the request to
   the RealSubject.
3. The Proxy creates or uses an instance of the RealSubject, controlling its creation and managing its lifecycle as
   needed.
4. The Proxy delegates the client's request to the RealSubject, either by forwarding the request directly or by adding
   additional behavior.
5. The client receives the response from the Proxy, unaware that it is actually interacting with the Proxy and not the
   RealSubject.

### Benefits

- Adds a level of indirection and control between clients and the real object, allowing for enhanced access management
  and additional functionality.
- Supports access control and security by enabling the Proxy to validate or restrict client requests.
- Facilitates lazy initialization by deferring the creation of the RealSubject until it is actually needed.
- Enables remote communication by using a Proxy to represent a remote object, handling communication details
  transparently.
- Provides a means for caching results or controlling expensive operations by having the Proxy handle caching or
  optimizing requests.

### Applications

- **Remote Proxies:** In distributed systems, a proxy can act as a representative of a remote object, allowing clients
  to interact with it as if it were a local object. This is commonly used in Remote Procedure Call (RPC), web services,
  or client-server architectures.

- **Virtual Proxies:** A virtual proxy defers the creation or loading of expensive resources until they are actually
  needed. It is commonly used for lazy initialization, such as loading large images or complex data structures only when
  they are required.

- **Protection Proxies:** Protection proxies control access to sensitive or restricted resources by acting as a
  gatekeeper. They can perform authentication, authorization, or other security checks before allowing clients to access
  the real object.

- **Caching Proxies:** Caching proxies store the results of expensive operations and return the cached results to
  subsequent requests, improving performance. They can be used to cache database queries, computation results, or
  network requests.

- **Logging Proxies:** Logging proxies add logging or auditing functionality to the real object's methods. They can be
  used to track method invocations, gather statistics, or debug interactions with the real object.

- **Smart Proxies:** Smart proxies add additional behaviors or functionalities to the real object without modifying its
  code. They can provide aspects like access control, reference counting, error handling, or synchronization.

- **Firewall Proxies:** Firewall proxies control network access to protect internal resources from unauthorized external
  requests. They act as intermediaries, filtering and forwarding requests based on predefined security policies.

- **Synchronization Proxies:** Synchronization proxies coordinate access to shared resources among multiple threads or
  processes. They can enforce mutual exclusion, thread safety, or other synchronization mechanisms.

- **Mock Proxies:** In unit testing or mocking frameworks, proxies can be used to replace real objects with mock
  objects, allowing for isolated testing of specific components.

- **Database Connection Proxies:** Connection pooling and management in database applications often use proxies to
  handle database connections. Proxies can handle connection establishment, pooling, recycling, or other
  database-related operations.

### Other Examples

An example of the Proxy pattern is a virtual proxy for loading images in a web application. The RealSubject represents
the actual image object, while the Proxy serves as a placeholder for the image. When a page is loaded, the Proxy is used
to display a low-resolution thumbnail of the image, allowing the page to load faster. Only when the user interacts with
the thumbnail and requests the full-size image, the Proxy loads the RealSubject and displays it. The Proxy manages the
lazy loading of the full-size image, providing a seamless and optimized user experience without the need to load all
images upfront.