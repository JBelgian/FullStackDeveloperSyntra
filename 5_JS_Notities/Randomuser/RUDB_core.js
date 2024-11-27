async function generateContent() {
    try {
      const response = await fetch("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          contents: [
            {
              parts: [
                {
                  text: "Explain how AI works"
                }
              ]
            }
          ]
        })
      });
  
      const data = await response.json();
      console.log(data);
      return JSON.stringify(data);
    } catch (error) {
      console.error("Error:", error);
    }
  }
  
  // Call the function
  generateContent();
  