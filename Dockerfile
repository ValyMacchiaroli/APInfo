FROM python:3.14-slim
RUN pip install memsearch \
    && mkdir -p quickstart-notes \
    && printf '# Notes\n\n- Redis TTL is 15 minutes\n- Staging URL is https://staging.example.com\n' > quickstart-notes/MEMORY.md \
    && pip install "memsearch[local]"