/**
 * Get the heading level based on the tag name.
 * @param {HTMLElement} headingElement - The heading element.
 * @returns {number} - The level of the heading (1 for <h1>, 2 for <h2>, etc.).
 */
function getHeadingLevel(headingElement) {
  switch (headingElement.tagName.toLowerCase()) {
    case "h1":
      return 1;
    case "h2":
      return 2;
    case "h3":
      return 3;
    case "h4":
      return 4;
    case "h5":
      return 5;
    case "h6":
      return 6;
    default:
      return 1;
  }
}

/**
 * Generate a unique ID for a heading element based on its text content.
 * @param {HTMLElement} headingElement - The heading element.
 * @returns {string} - The generated ID.
 */
function generateId(headingElement) {
  return headingElement.textContent.trim().replace(/\s+/g, "_");
}

/**
 * Create and insert the Table of Contents.
 * @param {HTMLElement} fromElement - The container element containing headings.
 * @param {HTMLElement} toElement - The container element where the TOC will be inserted.
 */
function generateTableOfContents(fromElement, toElement) {
  const headings = fromElement.querySelectorAll("h1, h2, h3, h4, h5, h6");
  const tocContainer = document.createElement("div");
  let currentLevel = getMostImportantHeadingLevel(headings) - 1;
  let currentElement = tocContainer;

  headings.forEach((heading) => {
    const headingLevel = getHeadingLevel(heading);
    const headingLevelDifference = headingLevel - currentLevel;
    const link = document.createElement("a");

    if (!heading.id) {
      heading.id = generateId(heading);
    }
    link.href = `#${heading.id}`;
    link.textContent = heading.textContent;

    if (headingLevelDifference > 0) {
      // Create new nested lists for deeper levels
      for (let i = 0; i < headingLevelDifference; i++) {
        const list = document.createElement("ol");
        const listItem = document.createElement("li");
        list.appendChild(listItem);
        currentElement.appendChild(list);
        currentElement = listItem;
      }
      currentElement.appendChild(link);
    } else {
      // Navigate up to the correct level
      for (let i = 0; i < -headingLevelDifference; i++) {
        currentElement = currentElement.parentNode.parentNode;
      }
      const listItem = document.createElement("li");
      listItem.appendChild(link);
      currentElement.parentNode.appendChild(listItem);
      currentElement = listItem;
    }

    currentLevel = headingLevel;
  });

  toElement.appendChild(tocContainer.firstChild);

  // Add smooth scrolling to all TOC links
  addSmoothScrolling();

  // Redirect to the section if URL hash matches an ID
  redirectToHash();
}

/**
 * Determine the most important heading level in the document.
 * @param {NodeList} headings - A list of heading elements.
 * @returns {number} - The level of the most important heading.
 */
function getMostImportantHeadingLevel(headings) {
  let highestLevel = 6; // Default to <h6>
  headings.forEach((heading) => {
    const level = getHeadingLevel(heading);
    if (level < highestLevel) {
      highestLevel = level;
    }
  });
  return highestLevel;
}

/**
 * Add smooth scrolling behavior specifically to TOC links.
 */
function addSmoothScrolling() {
  const tocLinks = document.querySelectorAll(".a2n_table-of-contents a");
  tocLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      const targetId = link.getAttribute("href").substring(1);
      const targetElement = document.getElementById(targetId);
      if (targetElement) {
        scrollToElement(targetElement);
      }
    });
  });
}

/**
 * Redirect to the section if the URL hash matches a heading ID.
 */
function redirectToHash() {
  const hash = window.location.hash;
  if (hash) {
    const targetElement = document.querySelector(`.a2n_article ${hash}`);
    if (targetElement) {
      // Ensure the TOC is loaded before scrolling
      setTimeout(() => {
        scrollToElement(targetElement);
      }, 0);
    }
  }
}

/**
 * Smoothly scroll to an element with a specified offset.
 * @param {HTMLElement} element - The element to scroll to.
 */
function scrollToElement(element) {
  const offset = 120; // Offset in pixels
  const elementPosition =
    element.getBoundingClientRect().top + window.pageYOffset;
  const offsetPosition = elementPosition - offset;

  window.scrollTo({
    top: offsetPosition,
    behavior: "smooth",
  });
}

// Initialize the Table of Contents when the DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
  const fromElement = document.querySelector(".a2n_article");
  const toElement = document.querySelector(".a2n_table-of-contents");
  if (fromElement && toElement) {
    generateTableOfContents(fromElement, toElement);
  }
});
