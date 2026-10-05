# 🩻 smartDicomViewer

### 🚀 Open-Source • Privacy-First • Web-Based DICOM Viewer

**smartDicomViewer** is a completely **free, open-source, browser-based DICOM viewer** built to make medical image viewing simple, fast, private, and accessible.

View **CT, MRI, X-Ray, Ultrasound, and other DICOM studies** directly from your browser — without installing desktop software and without uploading your medical images to a remote server.

> 🔒 **Privacy First:** DICOM files can be processed entirely inside your browser. Your images stay on your device and are not uploaded to smartDicomViewer servers.

> ⚠️ **Important:** smartDicomViewer is intended for **secondary viewing, sharing, education, and workflow integration**. It is **not intended to replace a certified primary diagnostic workstation or radiology reporting system.**

---

## ✨ Why smartDicomViewer?

Medical imaging should not always require a large desktop application.

smartDicomViewer brings essential DICOM viewing capabilities directly into modern browsers:

- 🌐 No desktop installation
- 🔒 Privacy-focused local processing
- ⚡ Fast browser-based rendering
- 📱 Mobile-friendly interface
- 🖥️ Desktop and laptop support
- 🔌 Simple API integration
- 🆓 Completely free to use
- 💻 Open-source
- 📂 Supports local DICOM files
- 🏥 Easy integration with hospital/clinic systems

---

## 🎯 Features

### 🩻 Advanced DICOM Viewing

View medical images directly inside your browser with powerful viewing tools.

- 🖼️ DICOM image rendering
- 🔍 Zoom & Pan
- 🔄 Image rotation
- ↔️ Window / Level adjustment
- 🎨 Window/Level presets
- 📐 Clinical measurements
- 📏 Distance measurement
- 📊 Pixel/value information
- 🔎 Image navigation
- 🧭 Series navigation

---

### 🧠 Advanced Visualization

For supported studies and datasets:

- 🧊 3D Volume Rendering
- 🔀 MPR — Multiplanar Reconstruction
- 🖥️ Multi-viewport layouts
- 1️⃣ 1 × 1
- 2️⃣ 2 × 2
- 3️⃣ 3 × 3
- 🔄 Synchronised image navigation
- 📚 Multi-slice browsing

---

### 🔐 Privacy First

smartDicomViewer is designed with privacy in mind.

Your DICOM images can be processed directly inside the browser:

```text
Your Device
     │
     ▼
┌──────────────────────┐
│   Browser Memory     │
│                      │
│  DICOM → Decode      │
│  DICOM → Render      │
│  DICOM → View        │
└──────────────────────┘
     │
     ▼
   Viewer
```

### 🚫 No mandatory image upload

The viewer does not require you to upload medical images to a smartDicomViewer cloud server.

This makes it suitable for workflows where keeping patient images within your own infrastructure is important.

> 🔒 **Your files. Your infrastructure. Your browser.**

---

# 🆓 Free API

smartDicomViewer can be integrated into:

- 🏥 Hospital Management Systems
- 🧪 Diagnostic Laboratory Portals
- 🩺 Clinic Websites
- 🖥️ PACS Workflows
- 📋 Patient Portals
- 📱 Healthcare Applications
- 🌐 Custom Web Applications
- 🧑‍⚕️ Doctor Portals
- 📂 Medical Image Archives

### No API key required

There is no mandatory:

- ❌ Registration
- ❌ Subscription
- ❌ API key
- ❌ Monthly payment
- ❌ Viewer license

Simply include the JavaScript library and open your DICOM files.

---

# ⚡ Quick Start

## 1️⃣ Include smartviewer.js

You can load the latest version directly through **jsDelivr CDN**.

```html
<script src="https://cdn.jsdelivr.net/gh/smartjoans-x/smartDicomViewer/smartviewer.js"></script>
```

That's it.

No npm installation is required for the basic browser integration.

---

# 🏥 2️⃣ Open DICOM Images from Your Server

The easiest integration method is to let your own web application provide the DICOM file URLs.

```html
<button id="view-btn">
    🩻 View DICOM Study
</button>

<script>
document.getElementById('view-btn').addEventListener('click', () => {

    SmartViewer.open({

        title: 'CT Brain - Patient Name',

        files: [
            '/studies/1234/IM0001.dcm',
            '/studies/1234/IM0002.dcm',
            '/studies/1234/IM0003.dcm'
        ]

    });

});
</script>
```

### 💡 How it works

```text
Hospital / Clinic System
          │
          ▼
     Patient Study
          │
          ▼
     Your Web Server
          │
          ▼
   smartDicomViewer
          │
          ▼
    Browser Memory
          │
          ▼
     🩻 DICOM Viewer
```

Your existing hospital system can remain responsible for:

- Patient authentication
- Study selection
- File access
- Permissions
- Database
- PACS/storage

smartDicomViewer handles the **browser-based viewing experience**.

---

# 📂 3️⃣ Open Local DICOM Files

Users can also open DICOM files directly from their computer, USB drive, CD/DVD, phone, or other local storage.

```html
<input
    type="file"
    multiple
    accept=".dcm,application/dicom"
    onchange="
        SmartViewer.open({
            title: 'My DICOM Study',
            files: [...this.files]
        })
    "
>
```

### 🖥️ Example workflow

```text
📁 Select DICOM Files
        ↓
🧠 Browser Reads Files
        ↓
🩻 smartDicomViewer
        ↓
🔍 View / Measure / Navigate
```

No backend is required for local-file viewing.

---

# 🌐 CORS Configuration

If your application uses **direct image URLs** or a **study manifest**, your server must allow the viewer to fetch those files.

Your server should return an appropriate CORS header such as:

```http
Access-Control-Allow-Origin: https://smartjoans.space
```

You may also need:

```http
Access-Control-Allow-Methods: GET, OPTIONS
```

and:

```http
Access-Control-Allow-Headers: Content-Type, Authorization
```

### ⚠️ Important

CORS configuration depends on your integration method.

If your own application reads the files and passes the resulting `File` objects to:

```javascript
SmartViewer.open({
    files: [...]
});
```

then the browser does not need the viewer CDN domain to directly fetch those files.

---

# 🧩 Integration Methods

smartDicomViewer can be integrated in several ways.

### 🥇 Method 1 — Direct Image URLs

Pass DICOM URLs directly:

```javascript
SmartViewer.open({
    title: 'CT Chest',
    files: [
        '/dicom/image001.dcm',
        '/dicom/image002.dcm',
        '/dicom/image003.dcm'
    ]
});
```

**Best for:**

- PACS integrations
- Hospital servers
- Internal web applications

---

### 🥈 Method 2 — Study / Series Manifest

Your backend can dynamically generate a list of DICOM files.

Example:

```javascript
SmartViewer.open({
    title: 'MRI Brain - Study 12345',

    files: studyFiles
});
```

Where:

```javascript
const studyFiles = [
    '/studies/12345/series1/001.dcm',
    '/studies/12345/series1/002.dcm',
    '/studies/12345/series1/003.dcm'
];
```

This makes it easy to connect smartDicomViewer to an existing database-driven medical application.

---

### 🥉 Method 3 — Browser File Objects

Users can select files directly:

```javascript
const input = document.querySelector('#dicomFiles');

input.addEventListener('change', () => {

    SmartViewer.open({
        title: 'Local DICOM Study',
        files: [...input.files]
    });

});
```

This is ideal for:

- 🖥️ Desktop users
- 💿 Scan CDs
- 💾 USB drives
- 📱 Mobile devices
- 🧪 Testing
- 🎓 Education

---

# 📱 Mobile Support

smartDicomViewer is designed to work on modern mobile browsers.

### 📲 Supported interactions

- 👆 Touch navigation
- 🤏 Pinch to zoom
- 🔍 Touch zoom
- ↔️ Pan
- 🔄 Orientation support
- 📱 Responsive layout

Example:

```text
        📱 Mobile
           │
     ┌─────▼─────┐
     │   DICOM   │
     │   IMAGE   │
     │           │
     │    🩻     │
     │           │
     └───────────┘
```

---

# 🧾 DICOM Format Support

smartDicomViewer is designed to support commonly encountered DICOM transfer syntaxes and image encodings.

### Supported formats include:

| Format             | Support |
| ------------------ | ------- |
| Uncompressed DICOM | ✅       |
| JPEG Baseline      | ✅       |
| JPEG Lossless      | ✅       |
| JPEG-LS            | ✅       |
| JPEG 2000          | ✅       |
| RLE                | ✅       |

> Actual browser-side support can depend on the specific DICOM dataset, transfer syntax, and implementation version.

---

# 🛠️ Viewer Tools

| Tool            | Description                      |
| --------------- | -------------------------------- |
| 🔍 Zoom         | Enlarge image details            |
| ✋ Pan           | Move around the image            |
| ☀️ Window/Level | Adjust image brightness/contrast |
| 🔄 Rotate       | Rotate image                     |
| 📏 Measure      | Measure distances                |
| 🧭 Navigate     | Browse through slices            |
| 🖥️ Layout      | Multiple viewport layouts        |
| 🧊 3D           | Volume visualization             |
| 🔀 MPR          | Multiplanar reconstruction       |
| 🎨 Presets      | Quick window/level presets       |

---

# 🏥 Example Hospital Integration

Imagine your hospital application already has a patient page:

```text
┌─────────────────────────────────────┐
│ 👤 Patient Information              │
│                                     │
│ Patient : John Doe                  │
│ Patient ID : PT100245               │
│ Study : CT Brain                    │
│ Date : 05 Oct 2026                  │
│                                     │
│        [ 🩻 View Images ]           │
└─────────────────────────────────────┘
```

Your application can simply call:

```javascript
SmartViewer.open({
    title: 'CT Brain - John Doe',
    files: [
        '/dicom/PT100245/001.dcm',
        '/dicom/PT100245/002.dcm',
        '/dicom/PT100245/003.dcm'
    ]
});
```

The patient stays inside your existing system while smartDicomViewer provides the viewing interface.

---

# 🔒 Security & Privacy

smartDicomViewer follows a privacy-first architecture.

### Recommended deployment practices

✅ Use HTTPS

✅ Protect DICOM URLs with authentication

✅ Restrict access based on user permissions

✅ Avoid exposing patient files publicly

✅ Use short-lived access URLs when appropriate

✅ Keep your PACS/storage server protected

✅ Configure CORS only for trusted origins

❌ Do not expose unrestricted DICOM directories

❌ Do not place sensitive patient information in public URLs

---

# 🧑‍⚕️ Medical Disclaimer

> ⚠️ **For Secondary Viewing Only**

smartDicomViewer is provided as an open-source software tool for:

- Secondary image viewing
- Sharing
- Education
- Research
- Development
- Workflow integration

It is **not intended to replace**:

- Certified diagnostic workstations
- Regulatory-approved medical devices
- PACS diagnostic software
- Radiology reporting systems
- Professional clinical judgment

Always follow applicable medical regulations, institutional policies, and professional standards when using medical imaging software.

---

# 🌍 Browser Compatibility

smartDicomViewer is designed for modern browsers.

| Browser            | Support |
| ------------------ | ------- |
| 🌐 Google Chrome   | ✅       |
| 🦊 Mozilla Firefox | ✅       |
| 🧭 Microsoft Edge  | ✅       |
| 🍎 Safari          | ✅       |
| 📱 Chrome Android  | ✅       |
| 📱 Safari iOS      | ✅       |

> Performance may vary depending on browser capabilities, device memory, GPU support, study size, and DICOM dataset complexity.

---

# ⚡ Performance

Because rendering happens inside the browser, performance depends primarily on the user's device.

For large studies:

- 💻 Desktop computers generally provide better performance
- 🧠 More RAM helps with large datasets
- 🎮 GPU capability can affect 3D rendering
- 📱 Mobile devices may have limitations with very large studies

---

# 📦 CDN Usage

You can use the library directly without downloading the repository.

```html
<script src="https://cdn.jsdelivr.net/gh/smartjoans-x/smartDicomViewer/smartviewer.js"></script>
```

### Advantages

🚀 Easy integration
🌐 No build system required
📦 No npm required
⚡ CDN delivery
🔄 Easy updates
💻 Works with plain HTML/JavaScript

---

# 💻 Local Development

Clone the repository:

```bash
git clone https://github.com/smartjoans-x/smartDicomViewer.git
```

Move into the directory:

```bash
cd smartDicomViewer
```

Then serve the project using any local web server.

For example:

```bash
python3 -m http.server 8080
```

Open:

```text
http://localhost:8080
```

> Using a local web server is recommended instead of opening HTML files directly with `file://`.

---

# 📁 Example Project Structure

```text
smartDicomViewer/
│
├── smartviewer.js
├── README.md
├── LICENSE
│
├── demo/
│   ├── index.html
│   └── assets/
│
├── examples/
│   ├── local-files.html
│   ├── server-files.html
│   └── manifest.html
│
└── docs/
    └── integration.md
```

---

# 🧪 Example: Complete HTML Integration

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>smartDicomViewer Demo</title>

    <script src="https://cdn.jsdelivr.net/gh/smartjoans-x/smartDicomViewer/smartviewer.js"></script>
</head>

<body>

    <h1>🩻 smartDicomViewer</h1>

    <button id="viewStudy">
        🔍 View DICOM Study
    </button>

    <script>

        document
            .getElementById('viewStudy')
            .addEventListener('click', () => {

                SmartViewer.open({

                    title: 'CT Brain',

                    files: [
                        '/studies/1234/IM0001.dcm',
                        '/studies/1234/IM0002.dcm',
                        '/studies/1234/IM0003.dcm'
                    ]

                });

            });

    </script>

</body>

</html>
```

---

# 🤝 Contributing

Contributions are welcome! 🎉

If you have:

- 🐛 Bug fixes
- ✨ New features
- 🎨 UI improvements
- ⚡ Performance improvements
- 📱 Mobile improvements
- 🧠 DICOM improvements
- 📚 Documentation updates

feel free to contribute.

### Contribution workflow

```bash
git clone https://github.com/smartjoans-x/smartDicomViewer.git

cd smartDicomViewer

git checkout -b feature/my-feature
```

Make your changes, test them, and create a pull request.

---

# 🐛 Report a Bug

Found something that doesn't work?

Please open a GitHub issue and include:

- 🌐 Browser & version
- 💻 Operating system
- 📱 Device information
- 🩻 DICOM modality
- 📦 DICOM transfer syntax if known
- 📝 Steps to reproduce
- 📸 Screenshots when appropriate
- ❌ Console errors if available

> 🔐 **Never upload real patient-identifiable DICOM files to a public GitHub issue.**

Use anonymized/test DICOM datasets instead.

---

# 💡 Feature Requests

Have an idea?

Open a feature request and tell us:

### What would you like?

```text
Feature:
Why is it useful?
How should it work?
Example workflow:
```

Possible future improvements may include:

- 🔄 More advanced MPR
- 🧊 Improved 3D rendering
- 📐 More measurement tools
- 🏥 PACS integrations
- 📱 Improved mobile controls
- ⚡ Performance improvements
- 🎨 Custom viewer themes
- 🧩 Plugin architecture

---

# 🗺️ Roadmap

### ✅ Current

- [x] Browser-based DICOM viewer
- [x] Local file viewing
- [x] Server file integration
- [x] CDN distribution
- [x] Responsive UI
- [x] Zoom / Pan
- [x] Window / Level
- [x] Multi-layout
- [x] Measurement tools
- [x] MPR
- [x] 3D visualization

### 🚧 Future

- [ ] Advanced annotation tools
- [ ] More DICOM modalities
- [ ] Improved mobile UX
- [ ] Advanced synchronization
- [ ] More 3D tools
- [ ] Additional PACS integrations
- [ ] Customizable viewer layouts
- [ ] Plugin/API extensions

---

# ⭐ Support the Project

If smartDicomViewer is useful to you:

### ⭐ Star the repository

Your GitHub star helps the project reach more developers and healthcare technology communities.

### 🐛 Report issues

Found a bug? Let us know.

### 💡 Share ideas

Your feedback can help shape future versions.

### 🤝 Contribute

Code, documentation, testing, and ideas are all welcome.

---

# 🔗 Project Links

🌐 **Project:**
[https://github.com/smartjoans-x/smartDicomViewer](https://github.com/smartjoans-x/smartDicomViewer)

📦 **CDN:**
[https://cdn.jsdelivr.net/gh/smartjoans-x/smartDicomViewer/smartviewer.js](https://cdn.jsdelivr.net/gh/smartjoans-x/smartDicomViewer/smartviewer.js)

🏠 **smartJOANS:**
[https://smartjoans.space](https://smartjoans.space)

---

# ❤️ Built for the Web

**smartDicomViewer** is built with a simple idea:

> 🩻 **Make DICOM viewing accessible, private, fast, and easy to integrate.**

No complicated installation.

No mandatory account.

No viewer subscription.

Just your browser and your DICOM images.

---

\<div align="center">

### 🩻 smartDicomViewer

**Open Source • Free • Private • Web-Based**

Made with ❤️ by **smartJOANS**

⭐ Star the project • 🐛 Report issues • 🤝 Contribute

\</div>
