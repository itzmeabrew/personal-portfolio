package com.personal.controller;

import com.personal.service.EmailService;
import com.personal.view.ResponseView;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.Map;

@RestController
@CrossOrigin(origins = "http://abrewabraham.dev")
@RequestMapping("/api")
public class MailRequestController
{
    @Autowired
    EmailService emailService;

    @PostMapping("sendmail")
    private ResponseEntity<ResponseView> sendMail(@RequestBody Map<String,String> payload)
    {
        final String mailid = payload.get("mailid");
        final String subject = payload.get("subject");
        final String body = payload.get("body");

        emailService.sendSimpleMessage(mailid,subject,body);
        System.out.println("Mail sent successfully");

        ResponseView response = new ResponseView("status","Mail send successfully");
        return ResponseEntity.ok(response);
    }
}
